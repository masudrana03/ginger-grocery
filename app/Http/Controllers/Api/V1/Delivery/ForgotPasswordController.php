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
     * Delivery Man Fogot Password Authentication.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function forgotPassword(Request $request){

        $request->validate( [
            'email'        => 'required',
        ] );


        $user = User::where( 'email', $request->email )->whereType(4)->first();

        if( $user == null ){
            return api()->error('Invalid Email');
        }

        $generateOtp = $this->generateOtp($user);

        $data = $this->sendOrderConfirmationEmail($generateOtp);

        return $data;


    }

    public function forgotPasswordSubmit(Request $request){

    }

    /**
     * Generate OTP for send confirmation email.
     *
     * @param object $user
     * @return JsonResponse
     */
    public function generateOtp( $user )
    {
        $otp =  random_int(100000 , 599999);

        $user->verify_otp = $otp;

        $user->save();

        return $user;
    }

    /**
     * User forget confirmation email with OTP.
     *
     * @param object $user
     * @return JsonResponse
     */
    public function sendOrderConfirmationEmail( $user )
    {
        $emailTemplate = EmailTemplate::whereType('Forgot_Password')->first();

        $body = preg_replace("/{user_name}/", $user->name, $emailTemplate->body);
        $body = preg_replace("/{verify_otp}/", $user->otp, $emailTemplate->body);

        $emailDetails = [
            'email'   => $user->email,
            'subject' => $emailTemplate->subject,
            'body'    => $body
        ];

        (new Email())->handle($emailDetails);

        return $emailDetails;
    }
}
