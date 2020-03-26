<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class isAdmin
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
      $rid=Auth::user()->role_id;
      if(Auth::check() && $rid==1)
        return $next($request);
        else {
          return redirect("/");
        }
    }
}
