<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class isAdmin
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
      // check if not admin return to admin login page
      if (!Auth::check()) {
          return redirect('/login');
        }
        if (Auth::check() && Auth::user()->type != 'admin') {

        return redirect('/home')->with('failureMsg','you are not admin .');
      }

        return $next($request);
    }
}
