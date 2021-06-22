<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserActivatedMiddleware
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
        if (config('ipms.require_activation')) {
            if (! auth()->user()->activated_at) {
                Auth::logout();

                return redirect()->route('login')
                    ->with('message','User is not activated. Please contact admin');
            }
        }

        return $next($request);
    }
}
