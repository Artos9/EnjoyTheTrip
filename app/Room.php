<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function object()
    {
        return $this->belongsTo('App\TouristObject');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
