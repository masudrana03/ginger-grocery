<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SendOtp;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class ResetPasswordController extends Controller
{
    /**
     * Send OTP On Email.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sendOtp( Request $request )
    {
        $validation = validateData( [
            'email' => 'required|email',
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }

        $user = User::where( 'email', $request->email )->first();

        if ( !$user ) {
            return api()->notFound( 'We can\'t find a user with that e-mail address.' );
        }

        $user->otp = rand( 100000, 999999 );
        $user->save();

        $user->notify( new SendOtp( $user->otp ) );

        return ok( 'We have e-mailed your password reset OTP!' );

    }

    /**
     * Reset the user's password.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function resetPassword( Request $request )
    {
        $validation = validateData( [
            'email'    => 'required|email',
            'otp'      => 'required',
            'password' => [
                'required',
                'confirmed',
                Password::min( 8 )
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ] );

        if ( $validation->fails() ) {
            return api()->validation( null, $validation->errors() );
        }

        $user = User::where( 'email', $request->email )->first();

        if ( !$user ) {
            return api()->notFound( 'We can\'t find a user with that e-mail address.' );
        }

        if ( $user->otp != $request->otp ) {
            return api()->notFound( 'OTP is not valid.' );
        }

        $user->password = bcrypt( $request->password );
        $user->save();

        return ok( 'Password has been reset!' );

    }
}
