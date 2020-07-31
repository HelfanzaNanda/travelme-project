<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\Date;
use App\DateOfDeparture;
use App\Departure;
use App\Driver;
use App\Hour;
use App\HourOfDeparture;
use App\Http\Controllers\Controller;
use App\Http\Resources\FullCalendarResource;
use App\Owner;
use App\Seat;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $datas = Departure::where('owner_id', Auth::guard('owner')->user()->id)->orderBy('id', 'ASC')->get();
        $dates = [];
        foreach($datas as $data){
            array_push($dates, $data->date);
        }
        return view('pages.owner.schedule.index', compact('datas', 'dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::where('owner_id', Auth::guard('owner')->user()->id)->get();
        $car = Car::where('status', '1')
            ->where('owner_id', Auth::guard('owner')->user()->id)->get()->count();

        if ($car > 0) {
            $hours = [];
            for ($i = 0; $i < 24; $i++) {
                if ($i > 9) {
                    $text_hour = $i.':00';
                } else {
                    $text_hour = '0'.$i.':00';
                }
                array_push($hours, $text_hour);
            }
            $destinations = ['Bandung', 'Cirebon','Jakarta', 'Jogja', 'Purwokerto' , 'Semarang', 'Solo', 'Surabaya'];
            $cars = Car::where('owner_id', Auth::guard('owner')->user()->id)->get();
                return view('pages.owner.schedule.create', compact(['cars', 'destinations', 'hours', 'drivers']));
        } else {
            return redirect()->back()->with('warning', 'Silahkan Tambahkan Mobil Dahulu! atau');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'destination' => 'required|regex:/^[\pL\s\-]+$/u',
            'price' => 'required|numeric',
            'date' => 'required',
            'hour.*' => 'required'
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute hanya boleh angka',
            'regex' => ':attribute hanya boleh huruf'
        ];

        $this->validate($request, $rules, $message);


        $delete_full_stop = preg_replace('/[^\w\s]/', '', $request->price);
        $departure = new Departure();
        $departure->owner_id = Auth::guard('owner')->user()->id;
        $departure->from = $request->from;
        $departure->destination = ucwords($request->destination);
        $departure->price = $delete_full_stop;
        $departure->save();


        $dates = explode(',', (string) $request->date);
        foreach ($dates as $date) {
            $date_id = DateOfDeparture::latest('id')->first();
            $itemDateOfDeparture = [
                'id' => $date_id == null ? 1 : $date_id->id + 1,
                'owner_id' => Auth::guard('owner')->user()->id,
                'departure_id' => $departure->id,
                'date' => Carbon::parse($date)->format('Y-m-d'),
            ];
            DateOfDeparture::create($itemDateOfDeparture);

            $hours = $request->hour;
            foreach ($hours as $key => $hour) {
                $hour_id = HourOfDeparture::latest('id')->first();
                $itemHourOfDeparture = [
                    'id' => $hour_id == null ? 1 : $hour_id->id + 1,
                    'owner_id' => Auth::guard('owner')->user()->id,
                    'date_id' => $itemDateOfDeparture['id'],
                    'driver_id' => $request->driver_id[$key],
                    'hour' => Carbon::parse($hour)->format('H:i'),
                    // 'seat' => $car->seat,
                    // 'remaining_seat' => $car->seat
                ];
                //dd($itemHourOfDeparture);
                $dataHour = HourOfDeparture::create($itemHourOfDeparture);
                $this->storeSeat($dataHour->driver->car->seat, $itemHourOfDeparture['id']);
            };
        }

        $this->storeDestinationBack($request);

        return redirect()->route('schedule.index')->with('success', 'Berhasil Menambahkan Data');
    }


    public function storeSeat($totalSeat, $hour_id)
    {
        $no = 1; 
        for ($i=0; $i < $totalSeat; $i++) { 
            $seat = new Seat();
            $seat->hour_id = $hour_id;
            $seat->name = $no++;
            $seat->save();
        }
        return true;
    }


    public function storeDestinationBack($request)
    {
        //$car = Car::where('owner_id', Auth::guard('owner')->user()->id)->first();

        $delete_full_stop = preg_replace('/[^\w\s]/', '', $request->price);

        $departure = new Departure();
        $departure->owner_id = Auth::guard('owner')->user()->id;
        $departure->from = ucwords($request->destination);
        $departure->destination = $request->from;
        $departure->price = $delete_full_stop;
        $departure->save();

        $dates = explode(',', (string) $request->date);
        foreach ($dates as $date) {
            $date_id = DateOfDeparture::latest('id')->first();
            $itemDateOfDeparture = [
                'id' => $date_id == null ? 1 : $date_id->id + 1,
                'owner_id' => Auth::guard('owner')->user()->id,
                'departure_id' => $departure->id,
                'date' => Carbon::parse($date)->format('Y-m-d'),
            ];
            DateOfDeparture::create($itemDateOfDeparture);

            $hours = $request->hour;
            foreach ($hours as $key => $hour) {
                $hour_id = HourOfDeparture::latest('id')->first();
                $itemHourOfDeparture = [
                    'id' => $hour_id == null ? 1 : $hour_id->id + 1,
                    'owner_id' => Auth::guard('owner')->user()->id,
                    'date_id' => $itemDateOfDeparture['id'],
                    'driver_id' => $request->driver_id[$key],
                    'hour' => Carbon::parse($hour)->addHours($request->add_hour)->format('H:i'),
                ];
                $dataHour = HourOfDeparture::create($itemHourOfDeparture);
                $this->storeSeat($dataHour->driver->car->seat, $itemHourOfDeparture['id']);
            };
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Departure::findOrFail($id);

        return view('pages.owner.schedule.show', compact('data'));

        //return view('pages.owner.schedule.show', compact('data'));
    }

    public function getcallendar($id)
    {
        // $data = Departure::findOrFail($id);
        // $result = [];
        // foreach ($data->dates as $key => $date) {
        //     $result[] = [
        //         'title' => $data->from . '-' . $data->destination,
        //         'start' => $date->date,
        //         'className' => 'fc-default'
        //     ];
        // }

        // return response()->json($result);

        $hours = HourOfDeparture::whereHas('date', function ($date) use ($id) {
            $date->whereHas('departure', function ($departure) use ($id) {
                $departure->where('id', $id);
            });
        })->get();

        return response()->json(FullCalendarResource::collection($hours));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $departures = Departure::where('owner_id', Auth::guard('owner')->user()->id)->get();

        $departure = Departure::findOrFail($id);
        $destinations = ['Bandung', 'Cirebon','Jakarta', 'Jogja', 'Purwokerto' , 'Semarang', 'Solo', 'Surabaya'];
        $dates = DateOfDeparture::where('departure_id', $id)->get();
        $itemDate = [];
        $hours = [];
        foreach ($dates as $val) {
            array_push($itemDate, Carbon::parse($val->date)->format('d-m-Y'));
            foreach ($val->hours as $hour) {
                $hours[$hour['hour']] = Carbon::parse($hour->hour)->format('H:i');
            }
        }
        $date = implode(",", $itemDate);

        $dataHours = [];
            for ($i = 0; $i < 24; $i++) {
                if ($i > 9) {
                    $text_hour = $i.':00';
                } else {
                    $text_hour = '0'.$i.':00';
                }
                array_push($dataHours, $text_hour);
            }

        return view('pages.owner.schedule.edit', compact(['departure', 'date', 'hours', 'destinations', 'dataHours']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $rules = [
            //'destination' => 'required|regex:/^[\pL\s\-]+$/u',
            'price' => 'required|numeric',
            'date' => 'required',
            'hour.*' => 'required'
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute hanya boleh angka',
            'regex' => ':attribute hanya boleh huruf'
        ];

        $this->validate($request, $rules, $message);

        $delete_full_stop = preg_replace('/[^\w\s]/', '', $request->price);

        $departure = Departure::findOrFail($id);
        $departure->owner_id = Auth::guard('owner')->user()->id;
        //$departure->from = 'Tegal';
        //$departure->destination = ucwords($request->destination);
        $departure->price = $delete_full_stop;
        $departure->update();

        $requestDates = explode(',', $request->date);
        $dbDates = DateOfDeparture::where('departure_id', $id)
            ->where('owner_id', Auth::guard('owner')->user()->id)
            ->get();

        $arrDbDates = [];
        foreach ($dbDates as $value) {
            $arrDbDates[] = $value->date;
        }

        $arrRequestDates = [];
        foreach ($requestDates as $value) {
            $format_value = Carbon::parse($value)->format('Y-m-d');
            $arrRequestDates[] = $format_value;
        }

        $arrDiffDb = array_diff($arrDbDates, $arrRequestDates);
        $arrDiffReq = array_diff($arrRequestDates, $arrDbDates);
        sort($arrDiffDb);
        sort($arrDiffReq);

        if (count($requestDates) == count($dbDates)) {
            foreach ($arrDiffDb as $key => $value) {
                DateOfDeparture::where('departure_id', $id)->whereDate('date', $value)->update([
                    'date' => $arrDiffReq[$key]
                ]);
            }
        } elseif (count($requestDates) > count($dbDates)) {
            foreach ($arrDiffReq as $value) {
                $lastIdDate = DateOfDeparture::latest('id')->pluck('id')->first();
                $itemDate = [
                    'id' => $lastIdDate == null ? 1 : $lastIdDate + 1,
                    'owner_id' => Auth::guard('owner')->user()->id,
                    'departure_id' => $id,
                    'date' => $value
                ];
                DateOfDeparture::create($itemDate);

                $car = Car::where('owner_id', Auth::guard('owner')->user()->id)->first();
                $hours = $request->hour;
                foreach ($hours as $hour) {
                    $itemHour[] = [
                        'owner_id' => Auth::guard('owner')->user()->id,
                        'date_id' => $itemDate['id'],
                        'hour' => $hour,
                        'seat' => $car->seat,
                        'remaining_seat' => $car->seat
                    ];
                };
            }
            DB::table('hour_of_departures')->insert($itemHour);
        } elseif (count($requestDates) < count($dbDates)) {
            foreach ($arrDiffDb as $value) {
                DateOfDeparture::where('date', $value)->delete();
            }
        }
        return redirect()->route('schedule.index')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Departure::findOrFail($id);
        $data->delete();
        return redirect()->route('schedule.index')->with('success', 'Berhasil Menghapus Data');
    }
}
