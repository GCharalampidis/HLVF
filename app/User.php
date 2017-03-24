<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo_id', 'hnumber', 'mnumber', 'skype'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function post()
//    {
//        return $this->hasOne('App\Post');
//    }
//
//    public function posts()
//    {
//        return $this->hasMany('App\Post');
//    }

    public function units()
    {
        return $this->hasMany('App\Unit');
    }

    public function unitsCount()
    {
        return Unit::where(['user_id' => $this->id])->count();
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin()
    {
        /*if($this->role->name == 'Administrator')
        {
            return true;
        }
        return false;*/
        return true;
    }
}
