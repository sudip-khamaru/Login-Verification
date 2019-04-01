<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyUserThroughEmail
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
        if( Auth::user()->status == 0 ) {

            Auth::logout();
            
            return redirect( 'login' )->with( 'warning-message', 'Please check your email for verify your account.' );

        }

        return $next($request);
    }
}
