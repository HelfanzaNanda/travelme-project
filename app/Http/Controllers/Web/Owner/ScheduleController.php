<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\Date;
use App\DateOfDeparture;
use App\Departure;
use App\Hour;
use App\Http\Controllers\Controller;
use App\Owner;
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
        return view('pages.owner.schedule.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domicile = Owner::where('id', Auth::guard('owner')->user()->id)->pluck('domicile')->first();


        $departures = Departure::where('owner_id', Auth::guard('owner')->user()->id)->get();

        if (count($departures) == 0) {
            $destinations = Owner::where('business_owner', Auth::guard('owner')->user()->business_owner)
                ->where('domicile', '!=', $domicile)->get();
        } else {
            $destinations = [];
            $dests = Owner::where('business_owner', Auth::guard('owner')->user()->business_owner)->where('domicile', '!=', $domicile)->get();
            foreach ($dests as $key => $value) {
                $departure = Departure::where('owner_id', Auth::guard('owner')->user()->id)
                    ->where('destination', $value->domicile)->first();

                if (!$departure) {
                    array_push($destinations, $value);
                }
            }
        }



        // $destinations = Owner::where('business_owner', Auth::guard('owner')->user()->business_owner)
        // ->where('domicile', '!=', $domicile)->get();
        $car = Car::where('status', '1')
            ->where('owner_id', Auth::guard('owner')->user()->id)->get()->count();

        if ($car > 0) {
            if (count($destinations) > 0) {
                $cars = Car::where('owner_id', Auth::guard('owner')->user()->id)->get();
                return view('pages.owner.schedule.create', compact(['cars', 'domicile', 'destinations']));
            } else {
                return redirect()->back()->with('warning', 'harus ada agent travel di kota lain yg sudah terdaftar di sistem ini, atau agent travel di kota lain sudah di tambahkan semua');
            }
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

        $car = Car::where('owner_id', Auth::guard('owner')->user()->id)->first();

        $delete_full_stop = preg_replace('/[^\w\s]/', '', $request->price);

        $departure = new Departure();
        $departure->owner_id = Auth::guard('owner')->user()->id;
        $departure->from = $request->from;
        $departure->destination = ucwords($request->destination);
        $departure->logo = ucwords($request->destination) . '.jpg';
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
            foreach ($hours as $hour) {
                $itemHourOfDeparture[] = [
                    'owner_id' => Auth::guard('owner')->user()->id,
                    'date_id' => $itemDateOfDeparture['id'],
                    'hour' => $hour,
                    'seat' => $car->seat,
                    'remaining_seat' => $car->seat
                ];
            };
        }
        DB::table('hour_of_departures')->insert($itemHourOfDeparture);


        return redirect()->route('schedule.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = Departure::findOrFail($id);
        $result = [];
        foreach ($data->dates as $key => $date) {
            $result[] = [
                'title' => $data->from . '-' . $data->destination,
                'start' => $date->date,
                'className' => 'fc-default'
            ];
        }

        return response()->json($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $domicile = Owner::where('id', Auth::guard('owner')->user()->id)->pluck('domicile')->first();

        $departures = Departure::where('owner_id', Auth::guard('owner')->user()->id)->get();

        $departure = Departure::findOrFail($id);

        $destinations = Owner::where('business_owner', Auth::guard('owner')->user()->business_owner)
            ->where('domicile', '!=', $domicile)->get();

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

        return view('pages.owner.schedule.edit', compact(['departure', 'date', 'hours', 'destinations']));
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

        $departure = Departure::findOrFail($id);
        $departure->owner_id = Auth::guard('owner')->user()->id;
        $departure->from = 'Tegal';
        $departure->destination = ucwords($request->destination);
        $departure->logo = ucwords($request->destination) . '.jpg';
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
            $lastIdDate = DateOfDeparture::latest('id')->first();
            foreach ($arrDiffReq as $value) {
                $itemDate = [
                    'id' => $lastIdDate == null ? 1 : $lastIdDate->id + 1,
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
