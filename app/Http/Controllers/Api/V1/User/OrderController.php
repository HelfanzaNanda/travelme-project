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
use App\Owner;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $this->middleware('auth:api')->except(['snapToken', 'notificationHandler']);
    }

    public function postOrder(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'departure_id' => 'required',
                'pickup_point' => 'required',
                'destination_point' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors(), 'status' => false, 'data' => (object) []]);
            }

            $dateFormat = Carbon::parse($request->date)->format('Y-m-d');

            //$order = Order::latest()->first();
            //$substr = $order ? substr($order->order_id, 6) : '';

            $data = new Order();
            $data->order_id = rand();
            //$order ? $data->order_id = 'ORDER-' . ($substr + 1) : $data->order_id = 'ORDER-101';
            $data->user_id = Auth::guard('api')->user()->id;
            $data->owner_id = $request->owner_id;
            $data->departure_id = $request->departure_id;
            $data->date = $dateFormat;
            $data->hour = $request->hour;
            $data->price = $request->price;
            $data->total_price = $request->price * $request->total_seat;
            $data->total_seat = $request->total_seat;
            $data->pickup_point = $request->pickup_point;
            $data->lat_pickup_point = $request->lat_pickup_point;
            $data->lng_pickup_point = $request->lng_pickup_point;
            $data->destination_point = $request->destination_point;
            $data->lat_destination_point = $request->lat_destination_point;
            $data->lng_destination_point = $request->lng_destination_point;
            $data->verify = '1';
            $data->status = 'none';
            $data->arrived = false;
            $data->done = false;
            $data->save();

            $date = DateOfDeparture::where('departure_id', $request->departure_id)
            ->where('date', $dateFormat)->first();
            $hour = HourOfDeparture::where('date_id', $date->id)->where('hour', $request->hour)->first();
            $hour->remaining_seat -= $request->total_seat;
            $hour->update();

            return response()->json([
                'message' => 'successfully order travel',
                'status' => true,
                'data' => new OrderResource($data)
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object) [],
            ]);
        }
    }

    public function snapToken(Request $request)
    {
        $orders = $request->item_details;

        $item_details = [];
        foreach ($orders as $val) {
            $order = Order::where('id', $val['id'])->first();

            $item_details[] = [
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
        try {
            $order = Order::where('user_id', Auth::guard('api')->user()->id)
                ->whereBetween('verify', ['1', '2'])->orderBy('id', 'ASC')->get();

            return response()->json([
                'message' => 'successfully get order by user',
                'status' => true,
                'data' => OrderResource::collection($order),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object) []
            ]);
        }
    }

    public function getAllOrder()
    {
        try {
            $orders = Order::all();
            return response()->json([
                'message' => 'successfully get all orders',
                'status' => true,
                'data' => OrderResource::collection($orders)
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object) []
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

        if($request->status == 'pending'){
            $owner = Owner::where('id', $order->owner_id)->first();
            $owner->balance += $order->total_price;
            $owner->update();
        }

        return response()->json([
            'message' => 'successfully update status order from user',
            'status' => true,
        ]);
    }
}
