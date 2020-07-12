<?php

namespace App\Http\Resources\driver;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            "id"            => $this->id,
            "number_plate"  => $this->number_plate,
            "facility"      => $this->facility,
            "photo"         => $this->photo,
            "status"        => $this->status,
        ];
    }
}
