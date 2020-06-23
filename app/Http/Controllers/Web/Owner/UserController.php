<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\DateOfDeparture;
use App\Driver;
use App\HourOfDeparture;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    public function index()
    {
        $datas = Order::where('owner_id', Auth::guard('owner')->user()->id)->get();
        return view('pages.owner.user.index', compact('datas'));
    }

    public function show($id)
    {
        $drivers = Driver::where('active', true)->get();
        $data = Order::findOrFail($id);
        return view('pages.owner.user.show', compact(['data', 'drivers']));
    }

    public function confirmed(Request $request,$id)
    {
        $driver = Driver::where('id', $request->driver_id)->first();
        $data = Order::findOrFail($id);
        $data->driver_id = $request->driver_id;
        $data->car_id = $driver->car_id;
        $data->verify = '2';
        $data->update();

        return redirect()->route('owner.user.index')->with('success', 'Berhasil Mengkonfirmasi Pesanan');
    }

    public function decline($id)
    {
        $data = Order::findOrFail($id);
        $data->verify = '0';
        $data->update();

        $date = DateOfDeparture::where('departure_id', $data->departure_id)->where('date', $data->date)->first();
        $hour = HourOfDeparture::where('date_id', $date->id)->where('hour', $data->hour)->first();
        $hour->remaining_seat += $data->total_seat;
        $hour->update();

        return redirect()->route('owner.user.index')->with('success', 'Berhasil Menolak Pesanan');
    }
}
