<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('LoggedInUser') && $request->path() !== 'auth/login'){
            return redirect('/')->with('fail', 'You should log in to continue!');
        }

        if(session()->has('LoggedInUser') && $request->path() === '/'){
            return back();
        }
        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, ust-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
