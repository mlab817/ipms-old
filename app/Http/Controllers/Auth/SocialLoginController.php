<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class SocialLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $socialiteUser = Socialite::driver('google')->user();

        $existingUser = User::where('email', $socialiteUser->email)->first();

        if (! $existingUser) {
            Alert::error('Error', 'Only existing users can use this feature. Please use the same email currently registered.');

            return redirect()->route('login');
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

        Alert::success('Welcome Back!', 'Thank you for using our application');

        return redirect()->route(RouteServiceProvider::HOME);
    }
}
