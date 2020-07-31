<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function notificationHandler(Request $request)
    {
        $serverKey = 'SB-Mid-server-lgheMLSAsWyuFmE1FmP7L2K1';
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode($serverKey . ':'),
        ];

        $datas = Order::get();
        $client = new Client();

        foreach ($datas as $p) {
            $res = $client->get('https://api.sandbox.midtrans.com/v2/' . $p->order_id . '/status', [
                'headers' => $headers
            ]);
            $data = json_decode($res->getBody()->getContents(), true);
            $notif = $data['transaction_status'] ? $data['transaction_status'] : 'expire';

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $orderId = $notif->order_id;
            $fraud = $notif->fraud_status;

            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $p->setPending();
                    } else {
                        $p->setSuccess();
                    }
                }
            } elseif ($transaction == 'settlement') {
                $p->setSuccess();
            } elseif ($transaction == 'pending') {
                $p->setPending();
            } elseif ($transaction == 'deny') {
                $p->setFailed();
            } elseif ($transaction == 'expire') {
                $p->setExpired();
            } elseif ($transaction == 'cancel') {
                $p->setFailed();
            }
        }
    }
}
