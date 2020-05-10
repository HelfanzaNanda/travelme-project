<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function register(Request $request)
    {
        try{
            $this->validate($request, [
                'name' => 'required',
                'email' => 'email|required|unique:users',
                'password' => 'required',
            ]);

            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->api_token = Str::random(80);

            $data->save();

            return response()->json([
                'status' => true,
                'message' => 'Register Successfully',
                'data' => $data
            ], 200);

        }catch (\Exception $e){
            $e->getMessage();
        }
    }
}
