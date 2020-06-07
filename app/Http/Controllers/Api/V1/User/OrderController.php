<?php

namespace App\Http\Controllers\Api\V1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\OrderResource;
use App\DateOfDeparture;
use App\HourOfDeparture;
use App\Order;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Controllers\Midtrans\Config;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $this->middleware('auth:api')->except('snapToken');
    }

    public function postOrder(Request $request)
    {
        try{

            $validator = Validator::make($request->all(),[
                'departure_id' => 'required',
                'pickup_location' => 'required',
                'destination_location' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json(['message' => $validator->errors(), 'status' => false, 'data'=> (object)[]]);
            }

            $order = Order::latest()->first();
            $substr = $order ? substr($order->order_id, 6) : '';

            $data = new Order();
            $order ? $data->order_id = 'ORDER-'.($substr + 1) : $data->order_id = 'ORDER-101';
            $data->user_id = Auth::guard('api')->user()->id;
            $data->owner_id = $request->owner_id;
            $data->departure_id = $request->departure_id;
            $data->date = $request->date;
            $data->hour = $request->hour;
            $data->price = $request->price;
            $data->total_price = $request->price * $request->total_seat;
            $data->total_seat = $request->total_seat;
            $data->pickup_location = $request->pickup_location;
            $data->destination_location = $request->destination_location;
            $data->status = 'belum melakukan pembayaran';
            $data->save();

            $date = DateOfDeparture::where('departure_id', $request->departure_id)->where('date', $request->date)->first();
            $hour = HourOfDeparture::where('date_id', $date->id)->where('hour', $request->hour)->first();
            $hour->remaining_seat -= $request->total_seat;
            $hour->update();

            return response()->json([
                'message' => 'successfully order travel',
                'status' => true,
                'data' => new OrderResource($data)
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data'=> (object)[],
            ]);
        }
    }


    // public function snapToken(Request $request)
    // {
    //     $order_id = rand();
    //     $converted = $request->item_details;
    //     $payload = [
    //         'transaction_details' => [
    //             'order_id' => $order_id
    //         ],
    //         'item_details' => $converted,
    //         'customer_details' => [
    //             'first_name' => 'admin',
    //             'email' => 'admin@gmail.com',
    //             'telephone' => '089663543354',
    //         ],
    //     ];

    //     try {
    //         $snapToken = Snap::getSnapToken($payload);
    //         return response()->json($snapToken);
    //     } catch (\Exception $exception) {
    //         return response()->json($exception->getMessage());
    //     }
    // }


    public function snapToken(Request $request)
    {
        $orders = $request->item_details;
    
        $item_details = [];
        foreach($orders as $val){
            $order = Order::where('id', $val['id'])->first();

            $item_details[] =[
                'id' => $order->hour,
                'price' => $val['price'],
                'quantity' => $val['quantity'],
                'name' => $val['name']
            ];
        }

        $payload = [
            'transaction_details' => [
                'order_id' => $order->order_id
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,
                'telephone' => $order->user->telp,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($payload);
            return response()->json($snapToken);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function orderByUser()
    {
        try{
            $order = Order::where('user_id', Auth::guard('api')->user()->id)
            ->whereBetween('verify',['1', '2'])->get();
            
            return response()->json([
                'message' => 'successfully get order by user',
                'status' => true,
                'data'=> OrderResource::collection($order),
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data'=> (object)[]
            ]);
        }
    }

    public function getAllOrder()
    {
        try{
            $orders = Order::all();
            return response()->json([
                'message' => 'successfully get all orders',
                'status' => true,
                'data'=> OrderResource::collection($orders)
            ]);

        }catch(Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data'=> (object)[]
            ]);
        }
    }

    public function cancelorder($id)
    {
        $order = Order::where('id', $id)->first();
        $order->verify = '0';
        $order->update();

        return response()->json([
            'message' => 'successfully cancel order from user',
            'status' => true,
        ]);
    }

    public function updateorder($id, Request $request)
    {
        $order = Order::where('id', $id)->first();
        $order->status = $request->status;
        $order->update();

        return response()->json([
            'message' => 'successfully update status order from user',
            'status' => true,
        ]);

    }
}
