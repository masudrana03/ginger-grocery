<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    /**
     * Redirect the user to their desire auth service provider
     *
     * @param Request $request
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        // Redirect the user to desire auth provider
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     *
     * @param Request $request
     * @param string $name provider name
     */
    public function handleProviderCallback(Request $request, $name)
    {
        if ($request->error) {
            //
        }

        try {
           // $user = Socialite::driver($name)->user();
            
            $user = Socialite::driver($name)->stateless()->user();

            return $user;

            $method = 'get' . ucfirst($name) . 'UserData';
            $data   = $this->$method($user);
        } catch (Exception $e) {
            report($e);
            //
        }

        // Check if the user already have in database
       // $user = User::where('email', $data['email'])->first();

        // Login the user
       // Auth::guard('web')->loginUsingId($user->id);

    }

    /**
     * Register the user's all necessery data
     *
     * @param Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique',
        ]);

        try {
            // Register the user's all necessery data
            $user                 = new User();
            $user->email          = $request->email;
            $user->password       = Hash::make($request->password);
            $user->referral_token = Str::random(20);
            $user->save();

            $token = $user->createToken('Bearer');

            $data = [
                'token_type' => 'Bearer',
                'token'      => $token->plainTextToken,
            ];

            return ok( 'User auth token generated successfully', $data );
        } catch (Exception $e) {
            return api()->error('registration Error');
        }
    }

    /**
     * Fetch the Google user data
     *
     * @param User $user
     *
     * @return array
     */
    public function getGoogleUserData($user)
    {
        $data['name']  = $user['name'];
        $data['email'] = $user['email'];

        if (!$data['email']) {
            throw new Exception('email Not Found');
        }

        return $data;
    }

    /**
     * Fetch the Microsoft graph user data
     *
     * @param User $user
     *
     * @return array
     */
    public function getFacebookUserData($user)
    {
        $data['name']  = $user['displayName'];
        $data['email'] = $user['userPrincipalName'];

        if (!$data['email']) {
            throw new Exception('email Not Found');
        }

        return $data;
    }
}
