<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;
    public function videos() {
        return $this->hasMany('App\Video');
    }
    public function posts() {
        return $this->hasMany('App\Post');
    }
    public function likes() {
        return $this->hasMany('App\Like');
    }
}
