<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Departure;
use App\HourOfDeparture;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\DepartureResource;
use App\Http\Resources\User\DepartureSearchResource;
use App\Http\Resources\User\OrderResource;
use App\Http\Resources\User\UserResource;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['getUsers', 'getUserLogIn']);
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

    public function order(Request $request)
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
            $data->status = '1';
            $data->save();

            $hour = HourOfDeparture::with(['date' => function($q)use($request){
                $q->where('date', $request->date);
            }])->where('hour', $request->hour)
            ->where('owner_id', $request->owner_id)->first();
            $hour->remaining_seat = $hour->remaining_seat - $request->total_seat;
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
