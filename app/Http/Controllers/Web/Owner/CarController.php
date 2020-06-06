<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\Driver;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
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
        $datas = Car::where('owner_id', Auth::guard('owner')->user()->id)->where('status', '1')->get();
        return view('pages.owner.car.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.owner.car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'number_plate' => 'required|unique:cars',
            'seat' => 'required|numeric',
            'facility' => 'required',
        ];

        $message = [
            "required" => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah pernah di tambahkan',
            'numeric' => ':attribute hanya boleh angka',
            'regex' => ':attribute hanya boleh huruf'
        ];

        $this->validate($request, $rules, $message);

        $photo = $request->file('photo');
        $path = time() . '.' . $photo->getClientOriginalExtension();
        $destinationPath = public_path('uploads/owner/car');
        $photo->move($destinationPath, $path);

        $data = new Car();
        $data->owner_id = Auth::guard('owner')->user()->id;
        $data->number_plate = strtoupper($request->number_plate);
        $data->seat = $request->seat;
        $data->facility = $request->facility;
        $data->photo = $path;
        $data->status = '1';
        $data->save();

        return redirect()->route('car.index')->with('success', 'Berhasil Menambahkan Data');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Car::findOrFail($id);
        //$this->jsonCalendar($id);
        return view('pages.owner.car.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $data = Car::findOrFail($id);
        return view('pages.owner.car.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'seat' => 'required|numeric',
            'facility' => 'required',
            'photo' => 'image|file|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = Car::findOrFail($id);
        $data->owner_id = Auth::guard('owner')->user()->id;
        $data->seat = $request->seat;
        $data->facility = $request->facility;
        $photo = $request->file('photo');
        if ($photo == '') {
            $data->photo = $request->old_photo;
        } else {
            $path = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('uploads/owner/car');
            $photo->move($destinationPath, $path);
            $data->photo = $path;
        }
        $data->status = '1';
        $data->update();

        return redirect()->route('car.index')->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Car::findOrFail($id);
        $data->update(['status' => '0']);
        Driver::where('car_id', $id)->update(['active' => false]);
        return redirect()->route('car.index')->with('success', 'Berhasil Menghapus Data');
    }

    /*private function get()
    {
        $data = Car::findOrFail($id);
        $data->owner_id = Auth::guard('owner')->user()->id;
        $data->name = $request->name;
        $data->from = 'Tegal';
        $data->destination = $request->destination;
        $data->price = $request->price;
        $data->seat = $request->seat;
        $data->facility = $request->facility;
        $photo = $request->file('photo');
        if ($photo == ''){
            $data->photo = $request->old_photo;
        }else{
            $path = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('uploads/owner/car');
            $photo->move($destinationPath, $path);
            $data->photo = $path;
        }
        $data->status = '1';
        $data->update();

        $request_dates = explode(',', $request->date);
        sort($request_dates);
        $dates = [];
        for ($i = 0; $i <count($request_dates); $i++){
            array_push($dates, $request_dates[$i]);
        }
        $ds = DateResource::where('car_id', $id)->get();

        $arr_ds = [];
        foreach ($ds as $key => $d) {
            array_push($arr_ds, array('date' => $d->date));
        }
        $arr_dates = [];
        foreach ($dates as $key => $value){
            $format_value = Carbon::parse($value)->format('Y-m-d');
            array_push($arr_dates, array('date' => $format_value));
        }
        $arr_column_ds = array_column($arr_ds, 'date');
        $arr_column = array_column($arr_dates, 'date');

        if (count($dates) == count($ds)){
            $arr_diff_db = array_diff($arr_column_ds, $arr_column);
            $arr_diff_req = array_diff($arr_column, $arr_column_ds);
            $date_db = DateResource::where('car_id', $id)->whereDate('date', $arr_diff_db)->first();
            $date_db->update([
                'date' => implode($arr_diff_req),
            ]);
        } elseif (count($dates) > count($ds)){
            foreach ($arr_dates as $key => $date){
                if (!in_array($date, $arr_ds)) {
                    $latest_date = DateResource::latest('id')->first();
                    $item = [
                        'id' => $latest_date == null ? 1 : $latest_date->id + 1,
                        'car_id' => $data->id,
                        'date' => $date["date"]
                    ];
                    DateResource::create($item);
                    $hours = $request->hour;
                    foreach ($hours as $hour) {
                        $h[] = [
                            'car_id' => $data->id,
                            'date_id' => $item['id'],
                            'hour' => $hour,
                            'seat' => $request->seat
                        ];
                    };
                }
            }
            DB::table('hours')->insert($h);
        }elseif (count($dates) < count($ds)){
            foreach ($arr_ds as $date){
                if (!in_array($date, $arr_dates)){
                    DateResource::where('date', $date)->delete();
                }
            }
        }
    }*/
}
