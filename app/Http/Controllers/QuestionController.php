<?php

namespace App\Http\Controllers;

use App\Lecture;
use App\Question;
use App\Unit;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $input = $request->all();

        Question::create($input);

        Session::flash('created_question', 'Question has been created.');

        return redirect('/lecture/'.$request->lecture_id.'/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.edit', compact('question'));
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
        $question = Question::findOrFail($id);

        $question->update($request->all());

        Session::flash('edited_question', 'Question has been edited.');

        return redirect('/lecture/'.$question->lecture->id.'/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        Session::flash('deleted_question', 'Question has been deleted.');

        return redirect('/lecture/'.$question->lecture->id.'/questions');
    }

    public function testIndex($lectureid)
    {
        $lecture = Lecture::find($lectureid);



        return view('questions.index', compact('lecture'));
    }

    public function testCreate($lectureid)
    {

        $lecture = Lecture::find($lectureid);
        return view('questions.create', compact('lecture'));


    }
}
