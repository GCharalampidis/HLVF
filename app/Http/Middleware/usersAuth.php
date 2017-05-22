<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class usersAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $id = $request->route('staff');

        $user = User::findOrFail($id); // Fetch the post

        if($user->id == Auth::user()->id)
        {
            return $next($request); // They're the owner, lets continue...
        }

        return view('errors.403');  // Nope! Get outta' here.
    }
}
