<?php

namespace App\Http\Middleware;

use App\Question;
use Closure;
use Illuminate\Support\Facades\Auth;

class questionsAuth
{

    public function handle($request, Closure $next)
    {

        $id = $request->route('questions');

        $question = Question::findOrFail($id); // Fetch the post

        if($question->lecture->unit->user->id == Auth::user()->id)
        {
            return $next($request); // They're the owner, lets continue...
        }

        return view('errors.403');


    }
}
