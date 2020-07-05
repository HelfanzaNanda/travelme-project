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
use Illuminate\Support\Facades\Mail;
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
            'domicile'         => 'required',
            'account_name'      => 'required|regex:/^[\pL\s\-]+$/u||min:5',
            'account_number'    => 'required|numeric|digits_between:10,16',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah terdaftar',
            'confirmed' => ':attribute tidak cocok',
            'digits_between' => ':attribute setidaknya :min sampai :max karakter',
            'name.regex'     => ':attribute harus huruf semua',
            'numeric'   => ':attribute hanya boleh angka',
        ];

        $this->validate($request, $rules, $message);

        $a = Travel::all()->where('license_number', '=', $request->license_number)->toArray();
        if ($a) {
            $data = new Owner();
            $data->license_number   = $request->license_number;
            $data->business_owner   = $request->business_owner;
            $data->business_name    = $request->business_name;
            $data->address          = $request->address;
            $data->email            = $request->email;
            $data->password         = Hash::make($request->password);
            $data->telephone        = $request->telephone;
            if ($request->domicile == 'Jogja' || $request->domicile == 'Jogjakarta') {
                $data->domicile         = 'Yogyakarta';
            } else {
                $data->domicile         = ucwords($request->domicile);
            }
            $data->activation_token = Str::random(100);
            $data->name_bank        = $request->name_bank;
            $data->account_number   = $request->account_number;
            $data->account_name     = $request->account_name;
            $data->save();

            $this->sendEmail($data);
        } else {
            return redirect()->back()->with('error', 'Silahkan urus license number dahulu');
        }

        //event(new AdminTravelActivationEmail($data));
        return redirect()->route('owner.login')->with('success', 'Berhasil Register, Silahkan Menunggu Verifikasi Dari Admin');
    }

    private function sendEmail($user)
    {
        Mail::send('send_email.email-register',
        [
            'content' => $user . 'telah mendaftar di sistem kita, silahkan cek lalu konfirmasi'
        ],
        function ($message)  use($user){
            $message->from($user->email, $user->business_name);
            $message->to('travelme@gmail.com', 'Travelme');
            $message->subject('Travel Mendaftar di Sistem Travelme');
        });
    }
}
