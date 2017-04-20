<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Lecture;
use Illuminate\Http\Request;

use App\Http\Requests;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $input = $request->all();
//        $contents = array();
//        $ids = array();
//        $k = 0;
//        $j = 0;
//
//        foreach ($request->get('content') as $content)
//        {
//            $contents[$k] = $content;
//            $k++;
//        }
//
//        foreach ($request->get('question_id') as $id)
//        {
//            $ids[$j] = $id;
//            $j++;
//
//        }
//
//        for($i = 0; $i < $j; $i++)
//        {
//            $input['content'] = $contents[$i];
//            $input['question_id'] = $ids[$i];
//            Answer::create($input);
//        }

        $input = $request->all();
        $count = 0;
        $sum = 0;

        foreach ($request->get('content') as $content)
        {
            $sum += $this->toValue($content);
            $count++;
        }

        $average = $sum/$count;

        $lecture = Lecture::find($request->get('id'));
        $lecture->average = $average;
        $lecture->answers += 1;
        $lecture->save();
//        Lecture::where('id', '=', $request->get('id'))->update(['average' => $average]);

        return redirect('/thankyou');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function toValue($content)
    {
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

        $value = 56;
        return $value;
    }
}
