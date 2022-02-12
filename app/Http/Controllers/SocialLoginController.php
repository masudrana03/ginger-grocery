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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function socialUpdate(Request $request)
    {

        $this->validate($request, [
            'client_id'     => 'required',
            'client_secret' => 'required',
            'redirect_url'  => 'required',
        ]);

        $socialLogin = Social::whereProvider($request->provider)->firstOrFail();

        $socialLogin->update($request->all());

        $this->setEnv($request->provider);

        toast('Social Media Settings successfully updated', 'success');

        return back();
    }

    /**
     * @param $provider
     */
    public function setEnv($provider)
    {
        $provider = Social::where('provider', $provider)->first();

        if ($provider->provider == 'google') {

            updateEnv('GOOGLE_CLIENT_ID', $provider->client_id);
            updateEnv('GOOGLE_CLIENT_SECRET', $provider->client_secret);
            updateEnv('GOOGLE_CALLBACK_ENDPOINT', $provider->redirect_url);

        }

        if ($provider->provider == 'facebook') {

            updateEnv('FACEBOOK_CLIENT_ID', $provider->client_id);
            updateEnv('FACEBOOK_CLIENT_SECRET', $provider->client_secret);
            updateEnv('FACEBOOK_CALLBACK_ENDPOINT', $provider->redirect_url);

        }
    }
}
