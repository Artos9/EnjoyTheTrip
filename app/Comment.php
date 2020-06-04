<?php

namespace App;

use App\EnjoyTheTrip\Presenters\CommentPresenter;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use CommentPresenter;
    public function commentable()
    {
        return $this->morthTo();
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }
}
