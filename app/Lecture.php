<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{

    protected $fillable = ['name','average', 'date', 'unit_id', 'active'];

    protected $dates = ['date'];

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function hasSliderQuestion()
    {
        $count = Question::where(['lecture_id' => $this->id])->where(['active' => 1])->where(['question_type' => 2])->count();
        if($count > 0) return true;
        else return false;
    }

    public function studentPercentage()
    {
        if($this->unit->studentnumber <= 0)
        {
            return 0;
        }
        else
        {
            return round($this->answers/$this->unit->studentnumber*100, 2);
        }

    }

    public function questionsCount()
    {
        return Question::where(['lecture_id' => $this->id])->where(['active' => 1])->count();
    }

    public function questionsCountAll()
    {
        return Question::where(['lecture_id' => $this->id])->count();
    }

//    public function avgScores()
//    {
//        if($this->questionsCount() > 0)
//        {
//            $answersum = 0;
//            $count = 0;
//
//            foreach($this->questions as $question)
//            {
//                foreach($question->answers as $answer)
//                {
//                    $answersum = $answersum + $answer->toValue();
//                    $count++;
//                }
//            }
//
//            $unitavg = $answersum/$count;
//        }
//        else
//        {
//            $unitavg = 0;
//        }
//
//        return $unitavg;
//    }


}
