<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Setting::create( ['key' => 'company_name', 'value' => 'Grocery Binary-fusion.com'] );
        Setting::create( ['key' => 'company_address', 'value' => '205 North Michigan Avenue, Suite 810'] );
        Setting::create( ['key' => 'email', 'value' => 'admin@gmail.com'] );
        Setting::create( ['key' => 'phone_code', 'value' => '+1'] );
        Setting::create( ['key' => 'phone', 'value' => '12124567890'] );
        Setting::create( ['key' => 'logo', 'value' => '2022-01-23-61ed177284a02.png'] );
        Setting::create( ['key' => 'favicon', 'value' => '2022-01-23-61ed16cdacc56.png'] );
        Setting::create( ['key' => 'mini_logo', 'value' => 'mini_logo.png'] );
        Setting::create( ['key' => 'login_image', 'value' => '2022-02-10-6204f9869465d.png'] );
        Setting::create( ['key' => 'contact_image', 'value' => '2022-02-10-6204f986c6ab6.png'] );
        Setting::create( ['key' => 'mail_driver', 'value' => 'smtp'] );
        Setting::create( ['key' => 'mail_host', 'value' => 'smtp.gmail.com'] );
        Setting::create( ['key' => 'mail_port', 'value' => '587'] );
        Setting::create( ['key' => 'mail_user_name', 'value' => 'mohasin2911@gmail.com'] );
        Setting::create( ['key' => 'mail_password', 'value' => 'gmlfywasvjmjwwes'] );
        Setting::create( ['key' => 'mail_from', 'value' => 'mohasin2911@gmail.com'] );
        Setting::create( ['key' => 'mail_from_name', 'value' => 'GroceFusion'] );
        Setting::create( ['key' => 'encryption', 'value' => 'tls'] );
        Setting::create( ['key' => 'loyalty_cart_status', 'value' => 'No'] );
        Setting::create( ['key' => 'loyalty_points', 'value' => 100] );
        Setting::create( ['key' => 'loyalty_points_value', 'value' => 1] );
        Setting::create( ['key' => 'city', 'value' => 'Chicago'] );
        Setting::create( ['key' => 'zip', 'value' => '60601'] );
        Setting::create( ['key' => 'country', 'value' => 'United States'] );
        Setting::create( ['key' => 'state', 'value' => 'CA'] );
        Setting::create( ['key' => 'currency', 'value' => '$'] );
        Setting::create( ['key' => 'hot_number', 'value' => '123456'] );
        Setting::create( ['key' => 'news_flash_one', 'value' => 'Welcome to Groce-Fusion'] );
        Setting::create( ['key' => 'news_flash_two', 'value' => 'Get 30% discount on your first order'] );
        Setting::create( ['key' => 'news_flash_three', 'value' => 'We are giving 10% discount on online payment'] );
        Setting::create( ['key' => 'facebook_link', 'value' => '#'] );
        Setting::create( ['key' => 'twitter_link', 'value' => '#'] );
        Setting::create( ['key' => 'instagram_link', 'value' => '#'] );
        Setting::create( ['key' => 'linkedin_link', 'value' => '#'] );
        Setting::create( ['key' => 'youtube_link', 'value' => '#'] );

    }
}
