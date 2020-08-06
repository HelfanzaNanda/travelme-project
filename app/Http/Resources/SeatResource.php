<?php

namespace App\Http\Resources;

use App\OrderDetail;
use App\Seat;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $seats = Seat::where('car_id', $this->id)->get();
        
        $resultSeat = [];
        foreach ($seats as $seat) {
            $orderDetail = OrderDetail::whereHas('order', function ($query) use($request) {
                $query->whereDate('date', Carbon::parse($request->date)->format('Y-m-d'))
                ->where('hour', $request->hour);
                 //->where('departure_id', $request->departure);
             })->where('seat_id', $seat->id)->first();
             
             $item = [
                'id' => $seat->id,
                'name' => $seat->name,
                'status' => $orderDetail ? "booked" : "available",
            ];

            array_push($resultSeat, $item);
        }

        return $resultSeat;
    }
}
