<?php

namespace App\Http\Controllers\Web\Owner;

use App\Charts\DashboardChart;
use App\Http\Controllers\Controller;
use App\Order;
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


        $orders = Order::where('verify', '2')->where('status', 'sudah melakukan pembayaran')->get();

        $chart = new DashboardChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->load('orders');


        $now = now()->format('Y-m-d');
        $count_order_verify = Order::where('verify', '2')
        ->where('status', 'sudah melakukan pembayaran')
        ->whereDate('date', $now)
        ->get()->count();
        $count_order_dont_verify = Order::where('verify', '1')
        ->whereDate('date', $now)->get()->count();

        $owner = Auth::guard('owner')->user();

        
        return view('pages.owner.dashboard', compact(['chart', 'count_order_verify', 'count_order_dont_verify', 'owner']));
    }

    public function take(Request $request)
    {
        $balance = Auth::guard('owner')->user()->balance;

        if($request->balance > $balance){
            return redirect()->back()->with('error', 'maaf saldo anda kurang dari Rp. '.number_format($request->balance));
        }

    }
}