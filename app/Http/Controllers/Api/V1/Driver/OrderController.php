<?php

namespace App\Http\Controllers\Api\V1\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\OrderResource;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM as FacadesFCM;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver-api');
    }

    public function getOrdersByDriver()
    {
        try{
            $now = Carbon::now()->format('Y-m-d');
            $order = Order::where('driver_id', Auth::guard('driver-api')->user()->id)
            ->whereDate('date', $now)->where('verify', '2')
            ->where('status', 'pending')->orderBy('id', 'ASC')->get();

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

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $message = "Driver Sudah Sampai Lokasi Penjemputan Anda";
        $notificationBuilder = new PayloadNotificationBuilder('travelme');
        $notificationBuilder->setBody($message)->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $_data = $dataBuilder->build();

        // You must change it to get your tokens
        $token = $order->user->fcm_token;
        $downstreamResponse = FacadesFCM::sendTo($token, $option, $notification, $_data);

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
