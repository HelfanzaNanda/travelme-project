<?php

namespace App\Http\Controllers\Web\Owner\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:owner')->except('logout');
    }

    public function getLogin(Request $request)
    {
        return view('auth_owner.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,

        ];

        if (Auth::guard('owner')->attempt($credential)){
            $user = Auth::guard('owner')->user();
            if ($user->active == '2'){
                return redirect()->intended(route('tdashboard.index'));
            }else{
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->with('error', 'Mohon Verifikasi Email Dahulu!');
            }
        }
        return redirect()->back()->withInput($request->only('email'))->with('error', 'Salah');
    }

    public function logout()
    {
        Auth::guard('owner')->logout();
        return redirect()->route('owner.login');
    }
}
