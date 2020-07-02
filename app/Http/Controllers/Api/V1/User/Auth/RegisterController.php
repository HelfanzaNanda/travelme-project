<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use App\Http\Controllers\Controller;
use App\User;
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

            $validator = Validator::make($request->all(),[
                'name' => 'required|min:5|regex:/^[\pL\s\-]+$/u',
                'email' => 'email|required|unique:users',
                'password' => 'required',
                'telp' => 'required|unique:users'
            ]);

            if ($validator->fails()){
                return response()->json([
                    'message' => $validator->errors(),
                    'status' => false,
                    'data' => (object)[]
                ], 401);
            }
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->telp = $request->telp;
            $data->api_token = Str::random(80);
            $data->fcm_token = $request->fcm_token;
            $data->active =  true;
            $data->save();
            $data->sendApiEmailVerificationNotification();
            $message = "Cek Email Anda, Verifikasi Dahulu";

            return response()->json([
                'message' => $message,
                'status' => true,
                'data' => $data
            ], 200);

        }catch (\Exception $e){

            return response()->json([
                'message' => $e->getMessage(),
                'status' => false,
            ]);
        }
    }
}
