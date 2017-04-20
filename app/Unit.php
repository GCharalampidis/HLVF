<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $fillable = ['name', 'semester', 'year', 'key', 'studentnumber', 'user_id'];

    protected $hidden = ['key'];

    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lecturesCount()
    {
        return Lecture::where(['unit_id' => $this->id])->count();
    }

    public function activeLecture()
    {
        //
    }

}
