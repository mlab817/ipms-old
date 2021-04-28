<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutOtherDevicesController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $request->validate([
            'password_logout' => ['required', new MatchOldPassword]
        ],[
            'password_logout.required' => 'Please type in your password.'
        ]);

        Auth::logoutOtherDevices($request->password_logout);

        session()->flash('success','Successfully logged out other devices.');

        return redirect()->back();
    }
}
