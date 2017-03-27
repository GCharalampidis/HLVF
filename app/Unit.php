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

    public function questionsCount()
    {
        return Question::where(['unit_id' => $this->id])->where(['active' => 1])->count();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
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
