<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $month = Carbon::now()->month-1;
        $owner_id =  Auth::guard('owner')->user()->id;
        $orders = Order::where('done', true)->where('owner_id',$owner_id)
        ->whereMonth('date', $month)->get();

        $date = (int)Carbon::now()->month($month)->endOfMonth()->format('d');

        $results = [];
        foreach ($orders as $order) {
            $d = (int)Carbon::parse($order->date)->format('d');
            $results["$d"] = [
                'date' => Carbon::parse($order->date)->format('d M Y'),
                'total_price' => $order->where('done', true)->sum('total_price'),
            ];
        }

        $totalPriceInMonth = Order::where('done', true)->where('owner_id',$owner_id)
        ->whereMonth('date', $month)->get()->sum('total_price');

        $nameMonth = date("F", mktime(0, 0, 0, $month+1, 1));

        return view('pages.owner.report.index', compact(['results', 'date', 'month', 'totalPriceInMonth', 'nameMonth']));

    }


    public function filter(Request $request)
    {
        $month = $request->month;
        $owner_id =  Auth::guard('owner')->user()->id;
        $orders = Order::where('done', true)->where('owner_id',$owner_id)
        ->whereMonth('date', $month)->get();

        $nameMonth = date("F", mktime(0, 0, 0, $month+1, 1));
        $totalPriceInMonth = Order::where('done', true)->where('owner_id',$owner_id)
        ->whereMonth('date', $month)->get()->sum('total_price');

        $date = (int)Carbon::now()->month($month)->endOfMonth()->format('d');

        $results = [];
        foreach ($orders as $order) {
            $d = (int)Carbon::parse($order->date)->format('d');
            $results["$d"] = [
                'date' => Carbon::parse($order->date)->format('d M Y'),
                'total_price' => $order->sum('total_price'),
            ];
        }
        return view('pages.owner.report.index', compact(['results', 'date', 'month', 'totalPriceInMonth', 'nameMonth']));

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
