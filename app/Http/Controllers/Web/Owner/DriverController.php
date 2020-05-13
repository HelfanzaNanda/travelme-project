<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $datas = Car::where('owner_id', Auth::guard('owner')->user()->id)->where('status', '1')->get();
        return view('pages.owner.driver.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nik'           => 'required|unique:drivers|max:16',
            'sim'           => 'required|unique:drivers|max:16',
            'name'          => 'required|regex:/^[\pL\s\-]+$/u',
            'email'         => 'required|unique:drivers',
            'telephone'     => 'required|numeric|max:13',
            'address'       => 'required',
            'avatar'        => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $avatar             = $request->file('avatar');
        $filename           = time().'-driver'.'.'. $avatar->getClientOriginalExtension();
        $destinationPath    = public_path('uploads/owner/driver');
        $avatar->move($destinationPath, $filename);

        $data               = new Driver();
        $data->owner_id     = Auth::guard('owner')->user()->id;
        $data->nik          = $request->nik;
        $data->sim          = $request->sim;
        $data->car_id       = $request->car_id;
        $data->name         = $request->name;
        $data->avatar       = $filename;
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
        /*$cars = Car::with(['driver' => function ($query){
            $query->where('car_id', null);
        }])->where('status', '1')->get();
        dd($cars);*/
        $cars = Car::all()->where('status', '1');
        return view('pages.owner.driver.edit', compact('data', 'cars'));
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
        $this->validate($request,[
            'name'          => 'required|regex:/^[\pL\s\-]+$/u',
            'telephone'     => 'required|numeric|max:13',
            'address'       => 'required',
            'avatar'        => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);


        $data               = Driver::findOrFail($id);
        $data->owner_id     = Auth::guard('owner')->user()->id;
        $data->car_id       = $request->car_id;
        $data->name         = $request->name;
        $data->gender       = $request->gender;
        $data->telephone    = $request->telephone;
        $data->address      = $request->address;
        if ($request->file('avatar') != ''){
            $avatar         = $request->file('avatar');
            $filename       = time().'-driver'.'.'. $avatar->getClientOriginalExtension();
            $destinationPath= public_path('uploads/owner/driver');
            $avatar->move($destinationPath, $filename);
            $data->avatar = $filename;
        }else{
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
