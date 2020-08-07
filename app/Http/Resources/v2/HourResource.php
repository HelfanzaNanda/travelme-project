<?php

namespace App\Http\Resources\v2;

use App\Departure;
use App\Http\Resources\SeatResource;
use App\OrderDetail;
use App\Seat;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class HourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            //'id' => $this->id,
            'hour' => date('H:i', strtotime($this->hour)),
            // 'seat' => $this->seat - 2,
            // 'remaining_seat' => $this->remaining_seat - 2,
        ];
    }
}
