<?php

namespace App\Http\Controllers\Web\Owner\Auth;

use App\Http\Controllers\Controller;
use App\Owner;
use App\Providers\RouteServiceProvider;
use App\Travel;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:owner');
    }

    public function getRegister()
    {
        return view('auth_owner.register');
    }

    public function register(Request $request)
    {
        $rules = [
            'license_number'    => 'required|unique:owners',
            'business_owner'    => 'required',
            'business_name'     => 'required',
            'address'           => 'required',
            'email'             => 'required|unique:owners|email',
            'password'          => 'required|confirmed',
            'telephone'         => 'required|unique:owners',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah terdaftar',
            'confirmed' => ':attribute tidak cocok'
        ];

        $this->validate($request, $rules, $message);

        $a = Travel::all()->where('license_number', '=', $request->license_number)->toArray();
        if ($a){
            $data = new Owner();
            $data->license_number   = $request->license_number;
            $data->business_owner   = $request->business_owner;
            $data->business_name    = $request->business_name;
            $data->address          = $request->address;
            $data->email            = $request->email;
            $data->password         = Hash::make($request->password);
            $data->telephone        = $request->telephone;
            $data->activation_token = Str::random(100);
            //dd($request->all());
            $data->save();
        }else{
            return redirect()->back()->with('error', 'Silahkan urus license number dahulu');
        }

        //event(new AdminTravelActivationEmail($data));
        return redirect()->route('owner.login')->with('success', 'Berhasil Register, Silahkan Verifikasi Email Dulu ');
    }
}
