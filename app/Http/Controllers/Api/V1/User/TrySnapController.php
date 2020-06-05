<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\Snap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrySnapController extends Controller
{

    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
        Config::$isSanitized = true;
        Config::$is3ds = true;

    }

    public function store(Request $request)
    {
        $converted = $request->item_details;
        $payload = [
            'transaction_details' => [
                'order_id' => '101'
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
}
