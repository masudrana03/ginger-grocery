<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['key' => 'company_name', 'value' => 'My company']);
        Setting::create(['key' => 'company_address', 'value' => 'Dhaka']);
        Setting::create(['key' => 'email', 'value' => 'admin@gmail.com']);
        Setting::create(['key' => 'phone', 'value' => '01820937110']);
        Setting::create(['key' => 'logo', 'value' => '']);
        Setting::create(['key' => 'favicon', 'value' => '']);
        Setting::create(['key' => 'mail_driver', 'value' => '']);
        Setting::create(['key' => 'mail_host', 'value' => '']);
        Setting::create(['key' => 'mail_port', 'value' => '']);
        Setting::create(['key' => 'mail_user_name', 'value' => '']);
        Setting::create(['key' => 'mail_password', 'value' => '']);
        Setting::create(['key' => 'mail_from', 'value' => '']);
        Setting::create(['key' => 'mail_from_name', 'value' => '']);
        Setting::create(['key' => 'encryption', 'value' => '']);
    }
}
