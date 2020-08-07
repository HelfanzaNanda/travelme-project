<?php

namespace App\Http\Resources\v2;

use Illuminate\Http\Resources\Json\JsonResource;

class HoursResource extends JsonResource
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
            'id' => $this->id,
            'hour' => date('H:i', strtotime($this->hour)),
            'seat' => $this->seat - 2,
            'remaining_seat' => $this->remaining_seat - 2,
            'date' => new DateResource($this->date),
            'car' => new CarResource($this->car)
        ];
    }
}
