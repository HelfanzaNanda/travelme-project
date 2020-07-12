<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Driver;
use App\Http\Resources\v2\DriverResource;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver-api');
    }

    public function profile()
    {
        try{
            $driver = Driver::where('id' , Auth::guard('driver-api')->user()->id)->first();
            return response()->json([
                'message' => 'succesfully get profile driver',
                'status' => true,
                'data' => new DriverResource($driver)
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function updateProfil(Request $request)
    {
        try{
            $validatior = Validator::make($request->all(),[
                'name' => 'required',
                'password' => 'required',
                'photo' => 'required|file|mimes:jpeg,jpg,png'
            ]);
            if ($validatior->fails()){
                return response()->json([
                    'message' => $validatior->errors(),
                    'status' => false,
                    'data' => (object)[]
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function domicile()
    {
        $driver = Driver::where('id',Auth::guard('driver-api')->user()->id)->first();
        $driver->you_are_domicile = true;
        $driver->update();

        return response()->json([
            'message' => 'you are in domicile',
            'status' => true,
            'data' => (object)[]
        ]);
    }

    public function goOff()
    {
        $driver = Driver::where('id',Auth::guard('driver-api')->user()->id)->first();
        $driver->you_are_domicile = false;
        $driver->update();

        return response()->json([
            'message' => 'you go off',
            'status' => true,
            'data' => (object)[]
        ]);
    }
}
