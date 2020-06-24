<?php

namespace App\Http\Resources\v2;

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
            "is_tegal"  => $this->is_tegal,
        ];
    }
}
