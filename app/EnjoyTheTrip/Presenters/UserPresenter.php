<?php
namespace App\EnjoyTheTrip\Presenters;


trait UserPresenter  {

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->surname;
    }
}