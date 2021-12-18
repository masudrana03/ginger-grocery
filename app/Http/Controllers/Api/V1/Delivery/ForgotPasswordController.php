<?php

namespace App\Http\Controllers\Api\V1\Delivery;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Components\Email\Email;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /**
     * Delivery Man Forgot Password Authentication.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function sendOtp(Request $request)
    {
        $request->validate( [
            'email'        => 'required',
        ] );

        $user = User::where( 'email', $request->email )->whereType(4)->first();

        if( !$user ){
            return api()->error('Invalid Email');
        }

        $user->verify_otp = rand(100000 , 599999);

        $user->save();

        $this->sendConfirmationEmail($user);

        return ok('Email send successfully with confirmation OTP');
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

        if ( $user->verify_otp != $request->otp ) {
            return api()->notFound( 'OTP is not valid.' );
        }

        $user->password   = bcrypt( $request->password );
        $user->verify_otp = null;
        $user->save();

        return ok( 'Password has been reset!' );

    }

    /**
     * User forgot confirmation email with OTP.
     *
     * @param object $user
     * @return JsonResponse
     */
    public function sendConfirmationEmail( $user )
    {
        $emailTemplate = EmailTemplate::whereType('Forgot_Password')->first();

        $body = preg_replace("/{user_name}/", $user->name, $emailTemplate->body);
        $body = preg_replace("/{verify_otp}/", $user->verify_otp, $emailTemplate->body);

        $emailDetails = [
            'email'   => $user->email,
            'subject' => $emailTemplate->subject,
            'body'    => $body
        ];

        (new EmailFactory())->initializeEmail($emailDetails);

        return $emailDetails;
    }
}
