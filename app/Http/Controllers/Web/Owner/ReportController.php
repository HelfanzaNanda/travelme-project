<?php

namespace App\Http\Controllers\Web\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $orders = Order::where('verify', '2')->where('status', 'settlement')
        ->where('owner_id', Auth::guard('owner')->user()->id)->get();

        $groupByDates = $orders->groupBy('date')->map(function ($row){
            return $row;
        });


        $number_month = 0;
        return view('pages.owner.report.index', compact(['orders', 'groupByDates', 'number_month']));
    }

    public function search(Request $request)
    {
        $month = $request->month+1;

        $orders = Order::where('verify', '2')->where('status', 'settlement')
        ->where('owner_id', Auth::guard('owner')->user()->id)
        ->whereMonth('date', $month)->get();

        $groupByDates = $orders->groupBy('date')->map(function ($row){
            return $row;
        });

        $number_month = $month-1;

        return view('pages.owner.report.search', compact(['orders', 'groupByDates', 'number_month']));
    }

    public function print(Request $request)
    {
        $m = $request->month;
        $orders = Order::where('verify', '2')->where('status', 'settlement')
        ->where('owner_id', Auth::guard('owner')->user()->id)
        ->whereMonth('date', $m+1)->get();

        $auth = Auth::guard('owner')->user();

        $groupByDates = $orders->groupBy('date')->map(function ($row){
            return $row;
        });

        $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                            'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $name_month = $month[$m];

        $pdf = PDF::loadview('pages.owner.report.print',  compact(['groupByDates', 'name_month', 'auth']));
        return $pdf->download('report '.$name_month.'.pdf');
    }
}
