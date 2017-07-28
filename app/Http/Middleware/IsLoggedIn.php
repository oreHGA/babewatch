<?php

namespace App\Http\Middleware;

use Closure;

class IsLoggedIn
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
        if( session()->has('user_name')){
          return $next($request);
        }

        return redirect()->route('welcome');
    }
}
