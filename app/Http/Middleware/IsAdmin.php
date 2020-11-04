<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->type == 1){
            return $next($request);
        }
        else if(auth()->user()->type == 0) {
            return redirect('/home')->with('error',"You don't have admin access.");
        }
        return redirect('/login')->with('error',"You don't have admin access.");
    }
}
