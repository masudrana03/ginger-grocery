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
        Setting::create( ['key' => 'company_name', 'value' => 'My company'] );
        Setting::create( ['key' => 'company_address', 'value' => 'Dhaka'] );
        Setting::create( ['key' => 'email', 'value' => 'admin@gmail.com'] );
        Setting::create( ['key' => 'phone', 'value' => '01820937110'] );
        Setting::create( ['key' => 'logo', 'value' => ''] );
        Setting::create( ['key' => 'favicon', 'value' => ''] );
        Setting::create( ['key' => 'mail_driver', 'value' => 'smtp'] );
        Setting::create( ['key' => 'mail_host', 'value' => 'smtp.gmail.com'] );
        Setting::create( ['key' => 'mail_port', 'value' => '587'] );
        Setting::create( ['key' => 'mail_user_name', 'value' => 'mohasin2911@gmail.com'] );
        Setting::create( ['key' => 'mail_password', 'value' => 'gmlfywasvjmjwwes'] );
        Setting::create( ['key' => 'mail_from', 'value' => 'mohasin2911@gmail.com'] );
        Setting::create( ['key' => 'mail_from_name', 'value' => 'Ginger Grocery'] );
        Setting::create( ['key' => 'encryption', 'value' => 'tls'] );
        Setting::create( ['key' => 'loyalty_cart_status', 'value' => 'No'] );
        Setting::create( ['key' => 'loyalty_points', 'value' => 100] );
        Setting::create( ['key' => 'loyalty_points_value', 'value' => 1] );
    }
}
