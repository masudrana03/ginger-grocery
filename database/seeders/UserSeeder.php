<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'users' )->insert( [
            'name'       => 'Admin',
            'email'      => 'admin@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone'      => '01718000000',
            'type'       => 1, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'user',
            'email'      => 'user@gmail.com',
            'password'   => Hash::make( '12345678' ),
            'phone'      => '01718000002',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Store Manager',
            'email'      => 'manager@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone'      => '01718000001',
            'type'       => 2, // 1: admin, 2: store manager, 3: customer
            'store_id'   => 1, // store id (optional) only for store manager
            'created_at' => now(),
        ] );
    }
}
