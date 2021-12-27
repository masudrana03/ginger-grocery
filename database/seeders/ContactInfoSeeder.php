<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactInfo::create( [
            'name'       => 'Shop',
            'email'      => 'Workmail@work.com',
            'phone'      => '01800000000',
            'country_id' => 5,
            'state'      => 'Test subject',
            'city'       => 'Test subject',
            'zip'        => 'Test subject',
            'address'    => 'Test subject',
            'created_at' => now(),
        ] );

        ContactInfo::create( [
            'name'       => 'Shop',
            'email'      => 'Workmail@work.com',
            'phone'      => '01800000000',
            'country_id' => 5,
            'state'      => 'Test subject',
            'city'       => 'Test subject',
            'zip'        => 'Test subject',
            'address'    => 'Test subject',
            'created_at' => now(),
        ] );
        
        ContactInfo::create( [
            'name'       => 'Shop',
            'email'      => 'Workmail@work.com',
            'phone'      => '01800000000',
            'country_id' => 5,
            'state'      => 'Test subject',
            'city'       => 'Test subject',
            'zip'        => 'Test subject',
            'address'    => 'Test subject',
            'created_at' => now(),
        ] );
    }
}
