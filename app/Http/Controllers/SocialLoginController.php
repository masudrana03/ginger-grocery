<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    public function socialIndex()
    {
        $google = Social::whereProvider('google')->first();
        $facebook = Social::whereProvider('facebook')->first();

        return view('backend.settings.socialite', compact('google', 'facebook'));
    }

    public function socialUpdate(Request $request)
    {

        // return $request;
        $this->validate($request, [
            'client_key'     => 'required',
            'client_secret'  => 'required',
            'redirect_url'   => 'required',
        ]);


        $socialLogin = Social::whereProvider($request->provider)->firstOrFail();

        // return $socialLogin;

        $socialLogin->update($request->all());

        toast('Payment method successfully updated', 'success');

        return back();
    }
}
