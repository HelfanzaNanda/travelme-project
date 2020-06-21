<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }

    public function departure(){
        return $this->belongsTo(Departure::class, 'departure_id', 'id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function car(){
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
    public function setPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }
 
    public function setSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }
 
    public function setFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }

    public function setExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }
}
