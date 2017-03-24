<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text', 'answer_type', 'active', 'unit_id'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
