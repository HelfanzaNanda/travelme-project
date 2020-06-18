<?php

namespace App\Http\Resources\User;

use App\HourOfDeparture;
use Illuminate\Http\Resources\Json\JsonResource;

class DateResource extends JsonResource
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
            'date' => date('d-m-Y', strtotime($this->date)),
            'hours' => HourResource::collection($this->hours),
        ];
    }
}
