<?php

namespace App\Http\Controllers\Api\V1\User;

use App\DateOfDeparture;
use App\Departure;
use App\HourOfDeparture;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\DepartureResource;
use App\Http\Resources\User\DepartureSearchResource;
use App\Http\Resources\User\OrderResource;
use App\Http\Resources\User\UserResource;
use App\Order;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Veritrans\Midtrans;

use App\Http\Controllers\Midtrans\Config;

// Midtrans API Resources
use App\Http\Controllers\Midtrans\Transaction;

// Plumbing
use App\Http\Controllers\Midtrans\ApiRequestor;
use App\Http\Controllers\Midtrans\SnapApiRequestor;
use App\Http\Controllers\Midtrans\Notification;
use App\Http\Controllers\Midtrans\CoreApi;
use App\Http\Controllers\Midtrans\Snap;

// Sanitization
use App\Http\Controllers\Midtrans\Sanitizer;

/**
 * @property  response
 */
class UserController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        //Midtrans::$serverKey = config('services.midtrans.serverKey');
        //Midtrans::$isProduction = false;
        $this->middleware('auth:api')->except(['getUsers', 'getUserLogIn', 'snapToken']);
    }

    public function getUsers()
    {
        try{
            $users = User::all();
            return response()->json([
                'message' => 'successfully get all users',
                'status' => true,
                'data' => UserResource::collection($users)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function getUserLogIn($api_token)
    {
        try{
            $token = substr($api_token, '7', '87');
            //dd($api_token, $token);
            $user = User::where('api_token', $token)->first();
            return response()->json([
                'message' => 'successfully get user is login',
                'status' => true,
                'data' => new UserResource($user)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }

    }

    public function getDestination()
    {
        try{
            $datas = Departure::all();
            return response()->json([
                'message' => 'successfully get destination',
                'status' => true,
                'data' => $datas
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function departureByDestination($destination)
    {
        try{
            $datas = Departure::where('destination', $destination)->get();

            $results = [];
            foreach ($datas as $val){
                if ($val->date){
                    array_push($results, $val);
                }
            }

            return response()->json([
                'message' => 'succeessfully get departure by destination',
                'status' => true,
                'data' => DepartureResource::collection(collect($results))
            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ], 200);
        }
    }

    public function search(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),['destination' => 'required', 'date' => 'required',]);

            if ($validator->fails()){
                return response()->json([
                    'message' => $validator->errors(),
                    'status' => false,
                    'data'=> (object)[],
                ], 501);
            }

            /*$date = Carbon::parse($request->date)->format('Y-m-d');
            $datas = Departure::with(['date' => function ($query) use ($date) {
                $query->where('date', $date);
            }])->where('destination', $request->destination)->get();*/

            $datas = Departure::where('destination', $request->destination)->get();

            $results = [];
            foreach ($datas as $val){
                if ($val->dates){
                    array_push($results, $val);
                }
            }

            return response()->json([
                'message' => 'successfully search departure',
                'status' => true,
                'data'=> DepartureSearchResource::collection(collect($results)),
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data'=> (object)[]
            ], 200);
        }
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
                return response()->json(['message' => $validator->errors(), 'status' => false, 'data'=> (object)[],]);
            }

            $data = new Order();
            $data->order_id = rand();
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
            $data->save();

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


    public function snapToken(Request $request)
    {
        $order_id = rand();
        $converted = $request->item_details;
        $payload = [
            'transaction_details' => [
                'order_id' => $order_id
            ],
            'item_details' => $converted,
            'customer_details' => [
                'first_name' => 'admin',
                'email' => 'admin@gmail.com',
                'telephone' => '089663543354',
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
            $order = Order::where('user_id', Auth::guard('api')->user()->id)->get();
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

    /*public function search(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'destination' => 'required',
                'date' => 'required',
            ]);

            if ($validator->fails()){
                return response()->json([
                    'message' => $validator->errors(),
                    'status' => false,
                    'data'=> (object)[],
                ], 501);
            }

            $date = Carbon::parse($request->date)->format('Y-m-d');
            $datas = Departure::with(['date' => function ($query) use ($date) {
                $query->where('date', $date);
            }])->where('destination', $request->destination)->get();

            $results = [];
            foreach ($datas as $val){
                //$check = $val->date;
                if (isset($val->date)){
                    array_push($results, $val);
                }
            }

            return response()->json([
                'message' => 'successfully search',
                'status' => true,
                'data'=> DepartureResource::collection(collect($results)),
            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data'=> (object)[],
            ], 404);
        }
    }*/

}
