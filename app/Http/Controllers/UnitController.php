<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnterUnitRequest;
use Illuminate\Http\Request;
use App\Unit;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class UnitController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','myAuth'], ['except' => ['checkKey']]);
        $this->middleware(['myAuth'], ['except' => ['checkKey','index','create','store']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        $units = Unit::all()->where('user_id', $userId);

        return view('admin.units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        Unit::create($input);

        Session::flash('created_unit', 'The unit has been created.');

        return redirect('/admin/units');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::findOrFail($id);

        return view('admin.units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);

        return view('admin.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $unit->update($request->all());

        Session::flash('edited_unit', 'The unit has been edited.');

        return redirect('/admin/units');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);

        $unit->delete();

        Session::flash('deleted_unit', 'The unit has been deleted.');

        return redirect('admin/units');
    }

//    public function showQuestions()
//    {
//        return redirect('questions');
//    }

    public function checkKey(Request $request)
    {
        $key = $request->key;

        $unit = Unit::where('key', $key)->first();
        if ($unit === null) {

            $mb = new MessageBag();
            $mb->add("form", "Unit key is incorrect.");
            return redirect('/enterkey')->withErrors($mb)->withInput();

        }
        return redirect('/answer/' . $unit->key);
    }

}
