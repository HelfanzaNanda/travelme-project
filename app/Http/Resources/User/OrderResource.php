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
            "order_id" => $this->order_id,
            "date" => $this->date,
            "hour" => $this->hour,
            "price" => $this->price,
            "total_price" => $this->total_price,
            "total_seat" => $this->total_seat,
            "pickup_point" => $this->pickup_point,
            "lat_pickup_point" => $this->lat_pickup_point,
            "lng_pickup_point" => $this->lng_pickup_point,
            "destination_point" => $this->destination_point,
            "lat_destination_point" => $this->lat_destination_point,
            "lng_destination_point" => $this->lng_destination_point,
            "verify" => $this->verify,
            "status" => $this->status,
            "user" => new UserResource($this->user),
            "owner" => new OwnerResource($this->owner),
            "departure" => new DepartureResource($this->departure),
            "driver" => new DriverResource($this->driver),
            "car" => new CarResource($this->car),
        ];
    }
}
