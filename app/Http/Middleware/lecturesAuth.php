<?php

namespace App\Http\Middleware;

use App\Lecture;
use Closure;
use Illuminate\Support\Facades\Auth;

class lecturesAuth
{
    public function handle($request, Closure $next)
    {

        $id = $request->route('lectures');

        $lecture = Lecture::findOrFail($id); // Fetch the post

        if($lecture->unit->user->id == Auth::user()->id)
        {
            return $next($request); // They're the owner, lets continue...
        }

        return view('errors.403');


    }
}
