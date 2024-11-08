<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->back()->withErrors( 'You Must Be Logged In !');
        }


        return $next($request);
    }
}