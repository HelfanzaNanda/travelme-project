<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Driver;
use App\Http\Resources\User\DriverResource;
use App\Http\Resources\User\OrderResource;
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

    public function order()
    {
        try{
            $order = Order::where('driver_id', Auth::guard('driver-api')->user()->id)->get();

            return response()->json([
                'message' => 'succesfully get order by driver',
                'status' => true,
                'data' => OrderResource::collection($order)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
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
}
