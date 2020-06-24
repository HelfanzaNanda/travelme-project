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
            'seat' => $this->seat,
            'remaining_seat' => $this->remaining_seat,
            'date' => new DateResource($this->date)
        ];
    }
}
