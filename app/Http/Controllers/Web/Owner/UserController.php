<?php

namespace App\Http\Controllers\Web\Owner;

use App\Car;
use App\Driver;
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
        $data->status = '0';
        $data->update();

        return redirect()->route('owner.user.index')->with('success', 'Berhasil Mengkonfirmasi Pesanan');
    }
}
