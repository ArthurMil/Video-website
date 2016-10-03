<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function likes() {
        return $this->hasMany('App\Likes');
    }
}
