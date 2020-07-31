<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function driver()
    {
        return $this->hasOne(Driver::class, 'car_id', 'id');
    }
}
