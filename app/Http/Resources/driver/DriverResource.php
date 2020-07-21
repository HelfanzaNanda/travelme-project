<?php

namespace App\Http\Resources\driver;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
            "id"        => $this->id,
            "nik"       => $this->nik,
            "sim"       => $this->sim,
            "name"      => $this->name,
            "gender"    => $this->gender,
            "api_token" => $this->api_token,
            "email"     => $this->email,
            "avatar"    => $this->avatar,
            "address"   => $this->address,
            "telephone" => $this->telephone,
            "active"    => $this->active,
            "location"  => $this->location,
            "owner"     => new OwnerResource($this->owner),
            "car"       => new CarResource($this->car)
        ];
    }
}
