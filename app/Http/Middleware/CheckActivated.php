<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckActivated
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
        if (auth()->check() && is_null(auth()->user()->activated_at)) {
            auth()->logout();

            return redirect()->route('login')
                ->withMessage('Your account has not been activated yet. Please contact the site admin to activate your account.');
        }

        return $next($request);
    }
}
