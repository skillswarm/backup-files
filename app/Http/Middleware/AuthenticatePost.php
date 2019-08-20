<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticatePost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = 'company')
    {
        if (!Auth::guard($guard)->check()) {
            flash(__('Only Employers can Post Problem statements!'))->error();
            return \Redirect::route('solutions');
        }
        return $next($request);
    }
}
