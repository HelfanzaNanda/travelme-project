<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    protected $guarded = [];

    public function date()
    {
        return $this->hasOne(DateOfDeparture::class, 'departure_id', 'id');
    }

    public function dates()
    {
        return $this->hasMany(DateOfDeparture::class, 'departure_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class,'owner_id', 'id');
    }
}
