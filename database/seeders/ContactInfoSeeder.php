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
            'name'       => 'Office',
            'email'      => 'contact@Evara.com',
            'phone'      => '(123) 456-7890',
            'country_id' => 5,
            'state'      => 'Test subject',
            'city'       => 'Chicago',
            'zip'        => '60601',
            'address'    => '205 North Michigan Avenue, Suite 810',
            'created_at' => now(),
        ] );

        ContactInfo::create( [
            'name'       => 'Shop',
            'email'      => 'Workmail@work.com',
            'phone'      => '(123) 456-7890',
            'country_id' => 5,
            'state'      => 'Test subject',
            'city'       => 'Chicago',
            'zip'        => '60601',
            'address'    => '205 North Michigan Avenue, Suite 810',
            'created_at' => now(),
        ] );

        ContactInfo::create( [
            'name'       => 'Shop',
            'email'      => 'Workmail@work.com',
            'phone'      => '(123) 456-7890',
            'country_id' => 5,
            'state'      => 'Test subject',
            'city'       => 'Chicago',
            'zip'        => '60601',
            'address'    => '205 North Michigan Avenue, Suite 810',
            'created_at' => now(),
        ] );
    }
}
