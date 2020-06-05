<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartureResource extends JsonResource
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
            'id'                => $this->id,
            'from'              => $this->from,
            'destination'       => $this->destination,
            'photo_destination' => $this->photo_destination,
            'price'             => $this->price,
            'owner'             => new OwnerResource($this->owner),
            //'date'              => new DateResource($this->date),
            'dates'             => DateResource::collection($this->dates)
        ];
    }
}
