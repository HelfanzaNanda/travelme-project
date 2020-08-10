<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\DateOfDeparture;
use App\Departure;
use App\Driver;
use App\HourOfDeparture;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeatResource;
use App\OrderDetail;
use App\Seat;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM as FacadesFCM;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner')->except(['fetchSeat', 'restructureSeat']);
    }

    public function index()
    {
        $drivers = Driver::where('owner_id', Auth::guard('owner')->user()->id)->get();
        $datas = Order::where('owner_id', Auth::guard('owner')->user()->id)
            ->orderBy('id', 'ASC')->get();

            $serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '.base64_encode($serverKey.':'),
            ];
      
            $client = new Client();
            $status = [];
            foreach ($datas as $p) {
              $res = $client->get('https://api.sandbox.midtrans.com/v2/'.$p->order_id.'/status', [

                'headers' => $headers
              ]);
              $data = json_decode($res->getBody()->getContents(), true);
              $st = empty($data['transaction_status']) ? 'expire' : $data['transaction_status'];
              array_push($status, $st);

              if($p->status == 'expire' && $p->verify == '1' && $p->snap_token == null){
                  $p->status = 'none';
                  $p->update();
              }else if($p->status != 'none'){
                $p->status = empty($data['transaction_status']) ? 'expire' : $data['transaction_status'];
                $p->update();
              }
            }   
        return view('pages.owner.user.index', compact('datas', 'drivers'));
    }


    public function filter(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $datas = Order::whereDate('date', $date)->where('owner_id', Auth::guard('owner')->user()->id)
            ->orderBy('id', 'ASC')->get();
        $drivers = Driver::where('owner_id', Auth::guard('owner')->user()->id)->get();

        return view('pages.owner.user.index', compact('datas', 'drivers'));
    }

    public function create()
    {
        $departures = Departure::where('owner_id', auth()->guard('owner')->user()->id)
        ->where('destination', '!=', 'Tegal')->get();
        ['Bandung', 'Cirebon','Jakarta', 'Jogja', 'Purwokerto' , 'Semarang', 'Solo', 'Surabaya'];
        return view('pages.owner.user.create', compact('departures'));
    }


    public function fetchSeat(Request $request)
    {
        $hour = HourOfDeparture::where('id', $request->hour_id)->first();
        $car = Car::where('id', $hour->car_id)->first();
        return $this->restructureSeat($request, $car, $hour);
    }

    public function restructureSeat($request, $car, $hour){
        $seats = Seat::where('car_id', $car->id)->get();
        
        $resultSeat = [];
        foreach ($seats as $seat) {
            $orderDetail = OrderDetail::whereHas('order', function ($query) use($request, $hour) {
                $query->whereDate('date', Carbon::parse($request->date)->format('Y-m-d'))
                ->where('hour', $hour->hour)
                 ->where('departure_id', $request->departure_id);
             })->where('seat_id', $seat->id)->first();
             
             $item = [
                'id' => $seat->id,
                'name' => $seat->name,
                'status' => $orderDetail ? "booked" : "available",
            ];

            array_push($resultSeat, $item);
        }

        return $resultSeat;
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = rand().'gmail.com';
        $user->password = Hash::make('12345678');
        $user->telp = $request->telp;
        $user->save();

        $hour = HourOfDeparture::where('id', $request->hour)->first();

        $order = new Order();
        $order->order_id = rand();
        $order->user_id = $user->id;
        $order->owner_id = Auth::guard('owner')->user()->id;
        $order->departure_id = $request->departure_id;
        $order->car_id = $hour->car_id;
        $order->date = Carbon::parse($request->date)->format('Y-m-d');
        $order->hour = $hour->hour;
        $order->pickup_point = $request->pickup_point;
        $order->destination_point = $request->destination_point;
        $order->payment = false;
        $order->save();


        $departure = Departure::where('id', $request->departure_id)->first();
        foreach ($request->seats as $seat) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->seat_id = $seat;
            $orderDetail->price = $departure->price;
            $orderDetail->save();

            $order->total_price += $departure->price;
            $order->update();
        }

        return redirect()->route('owner.user.index');
    }

    public function fetchHours($date)
    {
        $convertDate = Carbon::parse($date)->format('Y-m-d');
        $date = DateOfDeparture::whereDate('date', $convertDate)->first();
        $hours = HourOfDeparture::where('date_id', $date->id)->get(['id', 'hour']);
        return $hours;
    }

    public function getDrivers($id)
    {
        $order = Order::findOrFail($id);
        $drivers = Driver::where('owner_id', Auth::guard('owner')->user()->id)
        ->where('location' , $order->departure->from)
        ->get(['id','name']);
        return $drivers;
    }

    public function show($id)
    {
        $drivers = Driver::where('active', true)->get();
        $data = Order::findOrFail($id);
        return view('pages.owner.user.show', compact(['data', 'drivers']));
    }

    public function confirmed(Request $request, $id)
    {
        $data = Order::findOrFail($id);

        if ($data->verify == '0') {
            return back()->with('error', 'pesanan sudah di batalkan oleh pemesan');
        } else {

            if($data->user->fcm_token == null){
                $data->verify = '2';
                $data->update();
            }else{
                $data->verify = '2';
                $data->update();

                $optionBuilder = new OptionsBuilder();
                $optionBuilder->setTimeToLive(60 * 20);
                $message = "Pesanan Anda Sudah Di Verifikasi Admin";
                $notificationBuilder = new PayloadNotificationBuilder('travelme');
                $notificationBuilder->setBody($message)->setSound('default');

                $dataBuilder = new PayloadDataBuilder();
                $dataBuilder->addData(['a_data' => 'my_data']);
                $option = $optionBuilder->build();
                $notification = $notificationBuilder->build();
                $_data = $dataBuilder->build();
                
                $token = $data->user->fcm_token;
                FacadesFCM::sendTo($token, $option, $notification, $_data);
            }

            return redirect()->route('owner.user.index')->with('success', 'Berhasil Mengkonfirmasi Pesanan');
        }
    }

    public function chooseDriver(Request $request, $id)
    {
        $data = Order::findOrFail($id);
        $driver = Driver::where('id', $request->driver_id)->first();
        $order = Order::where('driver_id', $request->driver_id)
            //->where('date', $data->tanggal)
            ->where('arrived', false)->first();

        if ($order) {
            if ($order->date == $data->date) {
                if ($order->departure_id == $data->departure_id) {
                    $data->driver_id = $request->driver_id;
                    $data->car_id = $driver->car_id;
                    $data->update();
                    return redirect()->route('owner.user.index')->with('success', 'Berhasil Memilih sopir');
                } else {
                    return redirect()->back()->with('error', 'Supir hanya memiliki 1 tujuan');
                }
            } else {
                return redirect()->back()->with(
                    'error',
                    'Supir belum melakukan perjalanan, tunggu sampai supir selesai melakukan perjalanan'
                );
            }
        } else {
            $data->driver_id = $request->driver_id;
            $data->car_id = $driver->car_id;
            $data->update();
            return redirect()->route('owner.user.index')->with('success', 'Berhasil Mengganti sopir');
        }
    }

    public function decline(Request $request, $id)
    {

        $data = Order::findOrFail($id);
        $data->verify = '0';
        if ($request->additional_price == null) {
            $data->reason_for_refusing = $request->reason;
        } else {
            $data->additional_price = $request->additional_price;
        }
        $data->update();

        if ($request->additional_price == null) {
            $date = DateOfDeparture::where('departure_id', $data->departure_id)->where('date', $data->date)->first();
            $hour = HourOfDeparture::where('date_id', $date->id)->where('hour', $data->hour)->first();
            $hour->remaining_seat += $data->total_seat;
            $hour->update();
        }

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);
        $message = "Pesanan Anda Di Tolak";
        $notificationBuilder = new PayloadNotificationBuilder('travelme');
        $notificationBuilder->setBody($message)->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $_data = $dataBuilder->build();

        // You must change it to get your tokens
        $token = $data->user->fcm_token;
        $downstreamResponse = FacadesFCM::sendTo($token, $option, $notification, $_data);

        return redirect()->route('owner.user.index')->with('success', 'Berhasil Menolak Pesanan');
    }


    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->verify = '0';
        $order->update();

        return redirect()->route('owner.user.index')->with('success', 'Berhasil Menolak Pesanan');
    }
}
