<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeatResource;

class SeatController extends Controller
{
    public function checkSeat(Request $request)
    {
        $car = Car::where('id', $request->car_id)->first();
        return response()->json([
            'message' => 'berhasil check kursi',
            'status' => true,
            'data' => new SeatResource($car)
        ]);
    }
}
