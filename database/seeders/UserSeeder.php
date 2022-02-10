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
            'phone_code' => '+880',
            'phone'      => '1718000000',
            'type'       => 1, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'User',
            'email'      => 'user@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000002',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Tom cruise',
            'email'      => 'cruise@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000003',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Tom holland',
            'email'      => 'holland@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000004',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'tom hiddleston',
            'email'      => 'hiddleston@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000005',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Chris evans',
            'email'      => 'evans@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000006',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Chris hemsworth',
            'email'      => 'hemsworth@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000007',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Robert Downey Jr',
            'email'      => 'downey@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000008',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Joe Russo',
            'email'      => 'russo@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000009',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Stan Lee',
            'email'      => 'lee@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000010',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'James Gunn',
            'email'      => 'gunn@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000012',
            'type'       => 3, // 1: admin, 2: store manager, 3: customer
            'store_id'   => null,
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Store Manager',
            'email'      => 'manager@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000001',
            'type'       => 2, // 1: admin, 2: store manager, 3: customer
            'store_id'   => 1, // store id (optional) only for store manager
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Store Manager',
            'email'      => 'manager1@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000011',
            'type'       => 2, // 1: admin, 2: store manager, 3: customer
            'store_id'   => 2, // store id (optional) only for store manager
            'created_at' => now(),
        ] );

        DB::table( 'users' )->insert( [
            'name'       => 'Store Manager',
            'email'      => 'manager2@gmail.com',
            'password'   => Hash::make( 'password' ),
            'phone_code' => '+880',
            'phone'      => '1718000021',
            'type'       => 2, // 1: admin, 2: store manager, 3: customer
            'store_id'   => 6, // store id (optional) only for store manager
            'created_at' => now(),
        ] );
    }
}
