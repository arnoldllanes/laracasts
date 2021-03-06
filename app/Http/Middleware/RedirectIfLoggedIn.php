<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfLoggedIn
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
         if ( ! $request->user()->isLoggedIn() ) {

            return redirect('users');
        }
        
        return $next($request);
    }
}
