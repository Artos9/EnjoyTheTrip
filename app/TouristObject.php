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

    public function users()
    {
        return $this->morphToMany('App\User', 'likeable');
    }

    public function addresses()
    {
        return $this->hasOne('App\Address');
    }
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
    public function scopeOrdered($query)
    {
        return $this->orderBy('name');
    }

}
