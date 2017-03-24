<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $fillable = ['name', 'semester', 'year', 'key', 'user_id'];

    protected $hidden = ['key'];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
