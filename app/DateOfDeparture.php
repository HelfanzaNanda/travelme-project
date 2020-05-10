<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateOfDeparture extends Model
{
    protected $guarded = [];

    public function hours()
    {
        return $this->hasMany(HourOfDeparture::class, 'date_id', 'id');
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class, 'departure_id', 'id');
    }
}
