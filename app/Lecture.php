<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{

    protected $fillable = ['average', 'date', 'unit_id'];

    protected $dates = ['date'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function questionsCount()
    {
        return Question::where(['lecture_id' => $this->id])->where(['active' => 1])->count();
    }

    public function avgScores()
    {
        if($this->questionsCount() > 0)
        {
            $answersum = 0;
            $count = 0;

            foreach($this->questions as $question)
            {
                foreach($question->answers as $answer)
                {
                    $answersum = $answersum + $answer->toValue();
                    $count++;
                }
            }

            $unitavg = $answersum/$count;
        }
        else
        {
            $unitavg = 0;
        }

        return $unitavg;
    }


}
