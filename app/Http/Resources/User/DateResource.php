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
            'date' => $this->date,
            'hour' => new HourResource($this->hour)
            //'hours' => HourResource::collection($this->hours),
        ];
    }
}
