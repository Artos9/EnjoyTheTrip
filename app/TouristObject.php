<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TouristObject extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

}