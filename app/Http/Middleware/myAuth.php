<?php

namespace App\Http\Middleware;

use App\Unit;
use Closure;
use Illuminate\Support\Facades\Auth;

class MyAuth
{
    public function handle($request, Closure $next)
    {


            $id = $request->route('units');

            $unit = Unit::findOrFail($id); // Fetch the post

            if($unit->user->id == Auth::user()->id)
            {
                return $next($request); // They're the owner, lets continue...
            }

            return view('errors.403');  // Nope! Get outta' here.


    }
}
