<?php

namespace App\Http\Controllers\Web\Owner;

use App\Charts\DashboardChart;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChartResource;
use App\Order;
use App\Owner;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $now = now()->format('Y-m-d');
        $count_order_verify = Order::where('verify', '2')
            ->where('owner_id', Auth::guard('owner')->user()->id)
            ->where('status', 'pending')
            ->whereDate('date', $now)
            ->get()->count();
        $count_order_dont_verify = Order::where('verify', '1')
            ->where('owner_id', Auth::guard('owner')->user()->id)
            ->whereDate('date', $now)->get()->count();

        $owner = Auth::guard('owner')->user();


        return view('pages.owner.dashboard', compact(['count_order_verify', 'count_order_dont_verify', 'owner']));
    }

    public function take(Request $request)
    {
        $balance = Auth::guard('owner')->user()->balance;

        if ($request->balance > $balance) {
            return redirect()->back()->with('error', 'maaf saldo anda kurang dari Rp. ' . number_format($request->balance));
        }
    }

    public function chart()
    {
        $orders = Order::where('owner_id', Auth::guard('owner')->user()->id)->get(['departure_id', 'date']);
        $results = [];
        foreach ($orders as $key => $order) {
            $departure = $order->departure->from . ' -> ' . $order->departure->destination;
            $count = [];
                for ($i = 1; $i <= 12; $i++) {
                    $order_count = Order::where('owner_id', Auth::guard('owner')->user()->id)
                        ->whereMonth('date', $i)
                        ->where('done', true)->get()->count();
                    array_push($count, $order_count);
                }
                $item = [
                    "nama" => $departure,
                    "data" => $count,
                    
                ];
                if(!in_array($item, $results)){
                    $results[$key] = $item;
                }
        }
        return response()->json($results);
    }
}
