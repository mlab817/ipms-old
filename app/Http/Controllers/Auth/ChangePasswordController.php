<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function __invoke(ChangePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        if ($request->logout_other_devices) {
            Auth::logoutOtherDevices();
        }

        session()->flash('success','Successfully changed password');

        return redirect()->back();
    }
}
