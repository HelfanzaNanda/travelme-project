<?php

namespace App\Http\Controllers\Api\V1\Driver\Auth;

use App\Driver;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    //use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    //protected $redirectTo = 'home';

    public function __construct()
    {
        $this->middleware('guest:driver');
    }

    public function guard()
    {
        return Auth::guard('driver');
    }

    public function broker()
    {
        return Password::broker('drivers');
    }

    public function showResetForm(Request $request, $token  = null)
    {
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);    
    }

    protected function reset(Request $request)
    {
        $driver = Driver::where('email', $request->email)->first();
        $driver->password = Hash::make($request->password);
        $driver->setRememberToken(Str::random(60));
        $driver->update();

        return 'berhasil reset password, silahkan kembali ke aplikasi';

        // event(new PasswordReset($user));

        // $this->guard()->login($user);
    }
}
