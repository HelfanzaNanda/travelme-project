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
        $item_details[] = [
            'id' => '101',
            'quantity' => $request->qty,
            'price' => $request->price,
            'name' => $request->name,
        ];

        $payload = [
            'transaction_details' => [
                'order_id'  => '101',
                'gross_amount' => $request->price * $request->qty
            ],
            'customer_details' => [
                'first_name' => 'admin',
                'email' => 'admin@gmail.com',
                'telephone' => '089663543354',
            ],
            'item_details' => $item_details
        ];

        $snapToken = Snap::getSnapToken($payload);

        return response()->json([
            'message' => 'successfully order travel',
            'status' => true,
            'data' => $snapToken
        ]);
    }
}
