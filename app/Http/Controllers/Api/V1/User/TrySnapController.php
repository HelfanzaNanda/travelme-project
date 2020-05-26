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
        $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);

        $result = [];

        $orders = $request->all();

       /* $gross_amout = 0;
        foreach ($orders as $order){
            array_push($result, $order);
        }
        $payload = [
            'customer_details' => [
                'first_name' => 'admin',
                'email' => 'admin@gmail.com',
                'telephone' => '089663543354',
            ],
            'item_details' => $request->all()
        ];
        $snapToken = Snap::getSnapToken($payload);*/

        $output->writeln($orders);
       
        return response()->json(array_keys($orders));
    }
}
