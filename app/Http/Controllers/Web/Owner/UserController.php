<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\DateOfDeparture;
use App\Driver;
use App\HourOfDeparture;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM as FacadesFCM;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $drivers = Driver::where('owner_id', Auth::guard('owner')->user()->id)->get();
        $datas = Order::where('owner_id', Auth::guard('owner')->user()->id)
            ->orderBy('id', 'ASC')->get();

            $status = [];
            $serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic '.base64_encode($serverKey.':'),
            ];
      
            $client = new Client();
      
            foreach ($datas as $p) {
              $res = $client->get('https://api.sandbox.midtrans.com/v2/'.$p->order_id.'/status', [
                'headers' => $headers
              ]);
              $data = json_decode($res->getBody()->getContents(), true);
              $status[] = [
                'status' => $data->transaction_status,
                //'store' => $data['store']
              ];
      
            }   
        return view('pages.owner.user.index', compact('datas', 'drivers', 'status'));
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
            $data->verify = '2';
            $data->update();

            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60 * 20);
            $message = "Pesanan Anda Sudah Di Verifikasi Admin, Silahkan Lanjutkan Pembayaran";
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
            return redirect()->route('owner.user.index')->with('success', 'Berhasil Memilih sopir');
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
}
