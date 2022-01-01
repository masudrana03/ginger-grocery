<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Address::create( [
            'name'       => 'John Doe',
            'email'      => 'john@gmail.com',
            'phone'      => '01800000000',
            'address'    => 'Dhaka',
            'country_id' => 1,
            'city'       => 'Dhaka',
            'zip'        => '1234',
            'type'       => 1,
            'created_at' => now(),
        ] );

        Address::create( [
            'name'        => 'John Doe',
            'email'       => 'john2@gmail.com',
            'phone'       => '01800000000',
            'address'     => 'Dhaka',
            'country_id'  => 2,
            'city'        => 'Dhaka',
            'zip'         => '1234',
            'type'        => 2,
            'created_at' => now(),
        ] );
    }
}
