<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        EmailTemplate::create( [
            'type'       => 'Order',
            'subject'    => 'Order placed',
            'body'       => 'Your Have Successfully Placed The Order, <p>Hello {user_name},</p><p>Your Order Has Been Placed Successfully.<br>Your Invoice Number is {invoice_number}.<br></p>',
            'created_at' => now(),
        ] );

        EmailTemplate::create( [
            'type'       => 'contact_message',
            'subject'    => 'Thanks for email us!',
            'body'       => '<p>Hello {name},</p><p>We found your email. Our executive Officer will call or email you soon.<br>Thank you {name} connecting with us.<br></p>',
            'created_at' => now(),
        ] );

        EmailTemplate::create( [
            'type'       => 'Forgot_Password',
            'subject'    => 'Reset password OTP Verification',
            'body'       => '<p>Hello {user_name},</p><p>Reset your password.<br>Your OTP Number is {verify_otp}.<br></p>',
            'created_at' => now(),
        ] );

        EmailTemplate::create( [
            'type'       => 'user_Forgot_Password',
            'subject'    => 'Reset password OTP Verification',
            'body'       => '<p>Hello {name},</p><p>We heard that you lost your password. Sorry about that.!<br>But don’t worry! You can use the following OTP to reset your password:<br>Your OTP Number is {verify_otp}.<br>Reset your password<br>If you don’t use this Otp within 60 seconds.!, it will expire. To get a new password.<br><br>Thanks,<br>The '.settings('company_name').' Team</p>',
            'created_at' => now(),
        ] );
    }
}
