<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'question_id'];


    public function question()
    {
        return $this->belongsTo('App\Question');
    }

//    public function toValue()
//    {
//        $answer = $this->content;
//        $value = 666;
//        if($this->question->answer_type == 1)
//        {
//            if($answer == ':)')
//            {
//                $value = 100;
//            }
//            elseif ($answer == ':|')
//            {
//                $value = 50;
//            }
//            elseif ($answer == ':(')
//            {
//                $value = 0;
//            }
//        }
//        elseif ($this->question->answer_type == 2)
//        {
//            $value = $answer;
//        }
//        elseif ($this->question->answer_type == 3)
//        {
//            $value = 50;
//        }
//
//        return $value;
//    }

}

