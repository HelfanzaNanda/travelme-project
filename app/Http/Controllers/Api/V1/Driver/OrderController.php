<?php

namespace App\Http\Controllers\Api\V1\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\OrderResource;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver-api');
    }

    public function getOrdersByDriver()
    {
        try{
            $order = Order::where('driver_id', Auth::guard('driver-api')->user()->id)
            ->where('verify', '2')->orderBy('id', 'ASC')->get();

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

    public function arrived($id)
    {
        $order = Order::findOrFail($id);
        $order->arrived = true;
        $order->update();

        return response()->json([
            'message' => 'the driver arrived at the pickup location',
            'status' => true,
        ]);
    }

    public function done($id)
    {
        $order = Order::findOrFail($id);
        $order->done = true;
        $order->update();

        return response()->json([
            'message' => 'the driver has arrived at the destination location',
            'status' => true,
        ]);
    }
}
