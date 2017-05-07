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

        $questionsaverage = $sum/$count;

        $lecture = Lecture::find($request->get('id'));


//        $totalscore = $lecture->average * $lecture->answers;
//        $totalscore += $questionsaverage;
//        $lecture->answers += 1;
//        $lecture->average = $totalscore / $lecture->answers;

        $n = $lecture->answers;
        $currentaverage = $lecture->average;

        $lecture->answers += 1;

        $lecture->average = ($currentaverage*$n + $questionsaverage)/($n + 1); //Updating new average



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

        $value = -1;


        if(is_numeric($content))
        {
            $value = $content;
        }
        else
        {
            if($content == 'happy')
            {
                $value = 100;
            }
            elseif ($content == 'indifferent')
            {
                $value = 50;
            }
            elseif ($content == 'anxious')
            {
                $value = 40;
            }
            elseif ($content == 'bored')
            {
                $value = 30;
            }
            elseif ($content == 'sad')
            {
                $value = 20;
            }
            elseif ($content == 'angry')
            {
                $value = 10;
            }
            else
            {
                $value = -1;
            }
        }

        return $value;
    }
}
