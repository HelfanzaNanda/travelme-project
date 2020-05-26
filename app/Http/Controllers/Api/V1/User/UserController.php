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

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        //Midtrans::$serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
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

            $item_details[] = [
                'id' => $data->departure_id,
                'quantity' => $data->total_seat,
                'price' => $data->price,
                'name' => $data->date,
            ];

            //$midtrans = new Midtrans();

            //dd($data->total_seat, $request->total_seat);
            $payload = [
                'transaction_details' => [
                    'order_id'  => $data->id,
                    'gross_amount' => $data->total_price
                ],
                'customer_details' => [
                    'first_name' => 'nanda',
                    'email' => 'aa@gmail.com',
                    'telephone' => '04055',
                ],
                'item_details' => $item_details
            ];

            /*$date = DateOfDeparture::where('date', $request->date)->first();
            $hour = HourOfDeparture::where('date_id', $date->id)
                ->where('owner_id', $request->owner_id)
                ->where('hour', $request->hour)
                ->first();
            $hour->remaining_seat = $hour->remaining_seat - $request->total_seat;
            $hour->update();*/

            $snapToken = Snap::getSnapToken($payload);
            $data->snap_token = $snapToken;
            $data->save();

            return response()->json($snapToken);

            /*return response()->json([
                'message' => 'successfully order travel',
                'status' => true,
                'data' => new OrderResource($data)
            ]);*/


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
        try {
            $order_id = 101;

            $item_details[] = [
                'id' => $request->departure_id,
                'quantity' => $request->total_seat,
                'price' => $request->price,
                'name' => $request->date,
            ];

            $payload = [
                'transaction_details' => [
                    'order_id'  => $order_id,
                    'gross_amount' => $request->price * $request->total_seat,
                ],
                'customer_details' => [
                    'first_name' => $request->name,
                    'email' => $request->email,
                    'telephone' => $request->telp,
                ],
                'item_details' => $item_details
            ];

            $snapToken = Snap::getSnapToken($payload);

            return response()->json($snapToken);

            /*return response()->json([
                'message' => 'successfully get snap',
                'status' => true,
                'data' => $snapToken
            ]);*/
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => false,
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


    public function getSnapToken(Request $req){

        $item_list = array();
        $amount = 0;
        // Required

         $item_list[] = [
                'id' => "111",
                'price' => 20000,
                'quantity' => 1,
                'name' => "Majohn"
        ];

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 20000, // no decimal allowed for creditcard
        );


        // Optional
        $item_details = $item_list;

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'email'         => "andri@litani.com",
            'phone'         => "081122334455",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        // Optional, remove this to display all available payment methods
        $enable_payments = array();

        // Fill transaction details
        $transaction = array(
            'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );
        // return $transaction;
        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json($transaction);
            // return ['code' => 1 , 'message' => 'success' , 'result' => $snapToken];
        } catch (\Exception $e) {
            dd($e);
            return ['code' => 0 , 'message' => 'failed'];
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
