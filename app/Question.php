<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text', 'question_type', 'active', 'average', 'lecture_id'];

    public function lecture()
    {
        return $this->belongsTo('App\Lecture');
    }

}
