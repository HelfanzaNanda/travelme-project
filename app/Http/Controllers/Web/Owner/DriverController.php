<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\Driver;
use App\Http\Controllers\Controller;
use Dotenv\Regex\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DriverController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Driver::where('owner_id', Auth::guard('owner')->user()->id)->where('active', true)->get();

        return view('pages.owner.driver.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car = Car::where('status', '1')
        ->where('owner_id', Auth::guard('owner')->user()->id)->get()->count();

        $datas = Car::where('owner_id', Auth::guard('owner')->user()->id)
            ->where('status', '1')->get();

        $results = [];
        foreach ($datas as $data) {
            $driver = Driver::where('car_id', $data->id)
                ->where('active', '1')->first();
            if (!$driver) {
                array_push($results, $data);
            }
        }

        if ($car > 0 && $results) {
            return view('pages.owner.driver.create', compact('results'));
        } else {
            return redirect()->back()->with('warning', 'Silahkan Tambahkan Mobil Dahulu atau Mobil sudah di pakai driver lainnya');
        }

        //$datas = Car::where('owner_id', Auth::guard('owner')->user()->id)->where('status', '1')->get();
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
            'car_id'        => 'unique:drivers',
            'nik'           => 'required|unique:drivers|digits:16|numeric',
            'sim'           => 'required|unique:drivers|digits:12|numeric',
            'name'          => 'required|regex:/^[\pL\s\-]+$/u||min:5',
            'email'         => 'required|unique:drivers|email',
            'telephone'     => 'required|numeric|digits_between:11,13|regex:/(08)[0-9]{9}/|unique:drivers',
            'address'       => 'required|min:10',
        ];

        $message = [
            'required'  => ':attribute tidak boleh kosong',
            'unique'    => ':attribute sudah di tambahkan',
            'max'       => ':attribute maksimal :max karakter',
            'min'       => ':attribute minimal :min karakter',
            'email'     => ':attribute harus sesuai format email',
            'digits_between' => ':attribute setidaknya :min sampai :max karakter',
            'numeric'   => ':attribute hanya boleh angka',
            'digits'    => ':attribute harus :digits karakter',
            'telephone.regex'     => ':attribute harus sesuai format 08xx-xxxx-xxxx',
            'name.regex'     => ':attribute harus huruf semua'
        ];

        $this->validate($request, $rules, $message);

        $photo = $request->file('avatar');
        $filename = time() . '.' . $photo->getClientOriginalExtension();
        $filepath = 'driver/' . $filename;
        Storage::disk('s3')->put($filepath, file_get_contents($photo));

        $data               = new Driver();
        $data->owner_id     = Auth::guard('owner')->user()->id;
        $data->nik          = $request->nik;
        $data->sim          = $request->sim;
        $data->car_id       = $request->car_id;
        $data->name         = $request->name;
        $data->avatar       = Storage::disk('s3')->url($filepath, $filename);
        $data->gender       = $request->gender;
        $data->email        = $request->email;
        $data->password     = Hash::make($request->telephone);
        $data->telephone    = $request->telephone;
        $data->address      = $request->address;
        $data->api_token    = Str::random(80);
        $data->save();
        return redirect()->route('driver.index')->with('success', 'Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Driver::findOrFail($id);
        return view('pages.owner.driver.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Driver::find($id);
        $cars = Car::all()->where('status', '1');

        $results = [];
        foreach ($cars as $car) {
            $driver = Driver::where('car_id', $car->id)
                ->where('active', '1')->first();
            if (!$driver) {
                array_push($results, $car);
            }
        }

        if($results){
            return view('pages.owner.driver.edit', compact('data', 'results'));
        }else{
            return redirect()->back()->with('warning', 'Silahkan Tambahkan Mobil Dahulu atau Mobil sudah di pakai driver lainnya');
        }
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
        $rules = [
            'name'          => 'required|regex:/^[\pL\s\-]+$/u|min:5',
            'telephone'     => 'required|numeric|digits_between:11,13|regex:/(08)[0-9]{9}/',
            'address'       => 'required|min:10',
        ];

        $message = [
            'required'  => ':attribute tidak boleh kosong',
            'unique'    => ':attribute sudah di tambahkan',
            'max'       => ':attribute maksimal :max karakter',
            'min'       => ':attribute minimal :min karakter',
            'email'     => ':attribute harus sesuai format email',
            'digits_between' => ':attribute setidaknya :min sampai :max karakter',
            'numeric'   => ':attribute hanya boleh angka',
            'digits'    => ':attribute harus :digits karakter',
            'regex'     => ':attribute harus sesuai format 08xx-xxxx-xxxx'
        ];

        $this->validate($request, $rules, $message);

        $data               = Driver::findOrFail($id);
        $data->owner_id     = Auth::guard('owner')->user()->id;
        $data->car_id       = $request->car_id;
        $data->name         = $request->name;
        $data->gender       = $request->gender;
        $data->telephone    = $request->telephone;
        $data->address      = $request->address;
        
        if ($request->file('avatar') != '') {
            $photo = $request->file('avatar');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $filepath = 'driver/' . $filename;
            Storage::disk('s3')->put($filepath, file_get_contents($photo));
            
            $data->avatar = Storage::disk('s3')->url($filepath, $filename);;;
        } else {
            $data->avatar = $request->old_avatar;
        }
        $data->update();

        //        return response()->json([
        //            'data' => $data
        //        ], 201);



        return redirect()->route('driver.index')->with('success', 'Berhasil Mengupdate Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Driver::findOrFail($id);
        $data->update(['active' => false]);
        return redirect()->route('driver.index')->with('success', 'Berhasil Menghapus Data!');
    }
}
