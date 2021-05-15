<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PasswordChanged
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
        if (auth()->user() && ! auth()->user()->password_changed_at && !in_array($request->path(), ['change_password_index','change_password_post'])) {
            // redirect to change password with message
            return redirect()->route('change_password_index')
                ->withMessage('Please change your password to continue.');
        }

        return $next($request);
    }
}
