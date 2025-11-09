<?php

namespace App\Http\Middleware;

use Closure;

class Auth
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
        if(!auth()->user()) {
            return redirect('/login');
        }

        if(auth()->user()->role === 'super-admin' || auth()->user()->role === 'admin' || auth()->user()->role === 'writer') {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
