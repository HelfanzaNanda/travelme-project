<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartureSearchResource extends JsonResource
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
            'dates'   => DateResource::collection($this->dates->where('date', $request->date)),
        ];
    }
}
