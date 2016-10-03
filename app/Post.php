<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function video() {
        return $this->belongsTo('App\Video');
    }
    public function likes() {
        return $this->hasMany('App\Like');
    }
}
