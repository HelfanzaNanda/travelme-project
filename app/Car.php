<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function driver()
    {
        return $this->hasOne(Driver::class, 'driver_id', 'id');
    }
}
