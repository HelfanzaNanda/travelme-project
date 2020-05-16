<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Departure;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\DepartureResource;
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
            foreach ($datas as $key => $data){
                if ($data->owner->cars[$key]->driver){
                    if ($data->date){
                        if (count($data->date->hours) > 1){
                            foreach ($data->date->hours as $hour){
                                if ($hour){
                                    $results[] = $data;
                                }
                            }
                        }
                    }
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

            $date = Carbon::parse($request->date)->format('Y-m-d');
            $datas = Departure::with(['date' => function ($query) use ($date) {
                $query->where('date', $date);
            }])->where('destination', $request->destination)->get();

            $results = [];
            foreach ($datas as $data){
                if ($data->date){
                    if (count($data->date->hours) > 1){
                        foreach ($data->date->hours as $hour){
                            if ($hour){
                                $results[] = $data;
                            }
                        }
                    }
                }
            }

            return response()->json([
                'message' => 'successfully search departure',
                'status' => true,
                'data'=> DepartureResource::collection(collect($results)),
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
