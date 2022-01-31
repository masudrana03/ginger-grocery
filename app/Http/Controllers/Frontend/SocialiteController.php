<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class SocialiteController extends Controller
{
    /*
    This code is for google login
    */
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        if(User::where('email', $user->getEmail())->exists()){
            $userData = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($userData);
            return redirect()->route('user.profile')->with('status', 'Login Successfull with google Account!');
        }else{
            $googleUser = new User();
            $googleUser->name = $user->getName();
            $googleUser->email = $user->getEmail();
            $googleUser->email_verified_at = Carbon::now();
            $googleUser->password = Hash::make( 'password' );
            $googleUser->save();
            $userData = User::find($googleUser->id);
            Auth::guard()->login($userData);
            return redirect()->route('user.profile')->with('status', 'Login Successfull with google Account!');
        }
    }


    /*
    This code is for facebook login
    */
    public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookHandleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        if(User::where('email', $user->getEmail())->exists()){
            $userData = User::where('email', $user->getEmail())->first();
            Auth::guard()->login($userData);
            return redirect()->route('user.profile')->with('status', 'Login Successfull with facebook Account!');
        }else{
            $facebookUser = new User();
            $facebookUser->name = $user->getName();
            $facebookUser->email = $user->getEmail();
            $facebookUser->email_verified_at = Carbon::now();
            $facebookUser->password = Hash::make( 'password' );
            $facebookUser->save();
            $userData = User::find($facebookUser->id);
            Auth::guard()->login($userData);
            return redirect()->route('user.profile')->with('status', 'Login Successfull with facebook Account!');
        }
    }
}
