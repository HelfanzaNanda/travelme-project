<?php

namespace App\Http\Controllers\Web\Owner;

use App\Charts\DashboardChart;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

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
        
        return view('pages.owner.dashboard', compact('chart'));
    }
}