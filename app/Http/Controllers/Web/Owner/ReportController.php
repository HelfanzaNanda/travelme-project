<?php

namespace App\Http\Controllers\Web\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $orders = Order::where('verify', '2')->where('status', 'sudah melakukan pembayaran')
        ->where('owner_id', Auth::guard('owner')->user()->id)->get();

        $groupByDates = $orders->groupBy('date')->map(function ($row){
            return $row;
        });



        return view('pages.owner.report.index', compact(['orders', 'groupByDates']));
    }
}
