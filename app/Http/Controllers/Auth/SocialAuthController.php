<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/')->withErrors('Failed to authenticate with Google.');
        }
        
        $login_type = "google";
        $authUser = $this->Google_findOrCreateUser($user);

        // dd($authUser);
        // exit();
        Auth::login($authUser, true);

        return redirect()->intended('/');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/')->withErrors('Failed to authenticate with Facebook.');
        }

        $login_type = "facebook";

        $authUser = $this->facebook_findOrCreateUser($user);
        Auth::login($authUser, true);

        return redirect()->intended('/');
    }

    private function facebook_findOrCreateUser($googleUser)
    {
        $user = User::where('google_id', $googleUser->id)->first();

        if ($user) {
            return $user;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar,
        ]);
    }

    private function Google_findOrCreateUser($googleUser)
    {
        $user = User::where('google_id', $googleUser->id)->first();

        if ($user) {
            return $user;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar,
        ]);
    }
}
