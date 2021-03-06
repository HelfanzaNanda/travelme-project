<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'id' => $this->id,
            'hour' => date('H:i', strtotime($this->hour)),
            'seat' => $this->seat,
            'remaining_seat' => $this->remaining_seat
        ];
    }
}
