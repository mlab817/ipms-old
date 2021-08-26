<?php

namespace App\Http\Controllers\Auth;

use App\Events\AuthenticatedEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialLoginController extends Controller
{
    public $ip;

    public function __construct(Request $request)
    {
        $this->ip = $request->getClientIp();
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $socialiteUser = Socialite::driver('google')->user();

        $existingUser = User::where('email', $socialiteUser->email)->first();

        if (! $existingUser) {
            return redirect()->route('login')
                ->with('error', 'Only existing users can use this feature. Please use the same email currently registered.');
        }

        // if the existing user has no google id
        // set it
        if (! $existingUser->google_id) {
            $existingUser->update([
                'google_id' => $socialiteUser->id,
            ]);
        }

        $existingUser->update([
            'avatar' =>  $socialiteUser->avatar,
        ]);

        Auth::login($existingUser);

        event(new AuthenticatedEvent($this->ip, Auth::id()));

        return redirect()->route(RouteServiceProvider::HOME);
    }
}
