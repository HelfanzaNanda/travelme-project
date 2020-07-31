<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HourOfDeparture extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function date()
    {
        return $this->belongsTo(DateOfDeparture::class, 'date_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class, 'hour_id', 'id');
    }
}
