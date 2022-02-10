<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;




class SocialiteController extends Controller
{

    /*
    This code is for google login
    */
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function googleHandleProviderCallback(Request $request)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/register');
        }

        $user = Socialite::driver('google')->user();

        if (User::where('email', $user->getEmail())->exists()) {
            $userData = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($userData);
            return redirect()->route('user.profile')->with('status', 'Login Successful with google Account!');
        } else {
            $googleUser = new User();
            $googleUser->name = $user->getName();
            $googleUser->email = $user->getEmail();
            $googleUser->email_verified_at = Carbon::now();
            $googleUser->password = Hash::make('password');
            $googleUser->save();
            $userData = User::find($googleUser->id);
            Auth::guard()->login($userData);
            return redirect()->route('user.profile')->with('status', 'Login Successful with google Account!');
        }
    }


    /*
    This code is for facebook login
    */
    public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     */
    public function facebookHandleProviderCallback(Request $request)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/register');
        }

        $user = Socialite::driver('facebook')->stateless()->user();

        if (User::where('email', $user->getEmail())->exists()) {
            $userData = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($userData);
            return redirect()->route('user.profile')->with('status', 'Login Successful with facebook Account!');
        } else {
            $facebookUser = new User();
            $facebookUser->name = $user->getName();
            $facebookUser->email = $user->getEmail();
            $facebookUser->email_verified_at = Carbon::now();
            $facebookUser->password = Hash::make('password');
            $facebookUser->save();
            $userData = User::find($facebookUser->id);
            Auth::guard()->login($userData);
            return redirect()->route('user.profile')->with('status', 'Login Successful with facebook Account!');
        }
    }
}
