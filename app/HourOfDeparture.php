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

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
