<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HourOfDeparture extends Model
{
    protected $guarded = [];

    public function date()
    {
        return $this->belongsTo(DateOfDeparture::class, 'date_id', 'id');
    }
}
