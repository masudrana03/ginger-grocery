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
    }
}
