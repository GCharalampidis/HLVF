<?php

namespace App\Http\Controllers;

use App\Lecture;
use App\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class LectureController extends Controller
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

        Lecture::create($input);

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
        $lecture = Lecture::findOrFail($id);

        $lecture->delete();

        Session::flash('deleted_unit', 'The unit has been deleted.');

        return redirect('admin/units');
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

    public function massStore(Request $request)
    {
        $input = $request->all();

        $sdate = $request->get('starting_date');
        $stime = $request->get('starting_time');
        $nlectures = $request->get('lectures');
        $date = $this->getDate($sdate.' '.$stime.':00');
        $frequency = $request->get('frequency');

        for($i = 0; $i < $nlectures; $i++)
        {
            $date = $date->addWeeks($frequency);
            $input['date'] = $date;
            Lecture::create($input);
        }




        return redirect('/unit/'.$request->unit_id.'/lectures');
    }

    public function getDate($date)
    {
        return Carbon::parse($date);
    }
}
