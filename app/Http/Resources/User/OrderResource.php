<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "id" => $this->id,
            "date" => $this->date,
            "hour" => $this->hour,
            "price" => $this->price,
            "total_price" => $this->total_price,
            "total_seat" => $this->total_seat,
            "pickup_location" => $this->pickup_location,
            "destination_location" => $this->destination_location,
            "status" => $this->status,
            "user" => new UserResource($this->user),
            "owner" => new OwnerResource($this->owner),
            "departure" => new DepartureResource($this->departure),
            "driver" => new DriverResource($this->driver),
            "car" => new CarResource($this->car),
        ];
    }
}
