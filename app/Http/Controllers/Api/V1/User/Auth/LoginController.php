<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{public function __construct()
{
    $this->middleware('guest:web')->except('logout');
}

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,

        ];

        if (Auth::guard('web')->attempt($credential)){
            $user = Auth::guard('web')->user();
            if ($user->active == false){
                return response()->json([
                    'status' => true,
                    'message' => 'Login Successfully',
                    'data' => $user,
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Silahkan Aktifasi Email Dahulu',
                ], 401);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Masukan Email dan Password yang benar',
        ], 401);
    }
}
