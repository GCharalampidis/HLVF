<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureRequest;
use App\Http\Requests\MassLectureRequest;
use App\Lecture;
use App\Question;
use App\Unit;
use Carbon\Carbon;
use DebugBar\DebugBar;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Psy\Util\Json;

class LectureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['lecturesAuth'], ['only' => ['destroy','update','show','destroy','edit']]);
        $this->middleware(['myAuth'], ['only' => ['testIndex','testCreate','testMassCreate']]);
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
    public function store(LectureRequest $request)
    {
        $input = $request->all();

        $sdate = $request->get('date');
        $stime = $request->get('time');
        $date = $this->getDate($sdate.' '.$stime.':00');

        $input['date'] = $date;

        Lecture::create($input);

        Session::flash('created_lecture', 'Lecture has been created.');

        return redirect('/unit/'.$request->unit_id.'/lectures');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecture = Lecture::findOrFail($id);

        return view('lectures.show', compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecture = Lecture::findOrFail($id);

        return view('lectures.edit', compact('lecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LectureRequest $request, $id)
    {
        $lecture = Lecture::findOrFail($id);

        $input = $request->all();

        $sdate = $request->get('date');
        $stime = $request->get('time');
        $date = $this->getDate($sdate.' '.$stime.':00');

        $input['date'] = $date;


        $lecture->update($input);

        Session::flash('edited_lecture', 'The lecture has been edited.');

        return redirect('/unit/'.$lecture->unit->id.'/lectures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecture = Lecture::findOrFail($id);

        $lecture->delete();

        Session::flash('deleted_lecture', 'The lecture has been deleted.');

        return redirect('/unit/'.$lecture->unit->id.'/lectures');
    }

    public function testIndex($unitid)
    {
        $unit = Unit::find($unitid);

        return view('lectures.index', compact('unit'));
    }

    public function testCreate($unitid)
    {

        $unit = Unit::find($unitid);
        return view('lectures.create', compact('unit'));

    }

    public function testMassCreate($unitid)
    {
        $unit = Unit::find($unitid);
        return view('lectures.masscreate', compact('unit'));
    }

    public function massStore(MassLectureRequest $request)
    {
        $input = $request->all();

        $sdate = $request->get('starting_date');
        $stime = $request->get('starting_time');
        $nlectures = $request->get('lectures');
        $date = $this->getDate($sdate.' '.$stime.':00');
        $frequency = $request->get('frequency');

        $date = $date->addWeeks(0);
        $input['date'] = $date;
        $input['name'] = "Lecture #1";
        Lecture::create($input);

        for($i = 2; $i <= $nlectures; $i++)
        {
            $date = $date->addWeeks($frequency);
            $input['date'] = $date;
            $input['name'] = "Lecture #".$i;
            Lecture::create($input);
        }

        Session::flash('created_lectures', --$i.' lectures have been created. Click the "Mass Set Questions" button to set questions for all the sessions.');

        return redirect('/unit/'.$request->unit_id.'/lectures');
    }

    public function getDate($date)
    {
        return Carbon::parse($date);
    }

    public function updateStatuses(Request $request)
    {
        $input = $request->all();
        $active = $input['active'];
        $active = \GuzzleHttp\json_decode($active);
        $inactive = $input['inactive'];
        $inactive = \GuzzleHttp\json_decode($inactive);
        foreach ($active as $questionid)
        {
            $question = Question::find($questionid);
            $question->active = 1;
            $question->update();
        }

        foreach ($inactive as $questionid)
        {
            $question = Question::find($questionid);
            $question->active = 0;
            $question->update();
        }

        return response()->json(['message' => 'Post edited!'], 200);
    }
}
