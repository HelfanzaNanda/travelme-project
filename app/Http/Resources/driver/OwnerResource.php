<?php

namespace App\Http\Resources\driver;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            'license_number'    => $this->license_number,
            'business_name'     => $this->business_name,
            'business_owner'     => $this->business_owner,
            'address'           => $this->address,
            'email'             => $this->email,
            'photo'            => $this->photo,
            'telephone'         => $this->telephone,
            'balance'           => $this->balance,
            'domicile'          => $this->domicile,
        ];
    }
}
