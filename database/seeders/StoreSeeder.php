<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'stores' )->insert( [
            'name'            => 'My Store',
            'type'            => 'Store type',
            'image'           => 'default.png',
            'phone'           => '+880 1743203343',
            'established_at'  => '1952',
            'country_id'      => 3,
            'state'           => 'default',
            'city'            => 'Dhaka',
            'zip'             => '1000',
            'address'         => 'I am the Address',
            'description'     => 'This world is beautiful and it have many life form.',
            'facebook_link'   => 'facebook.com',
            'instagram_link'  => 'instagram.com',
            'twitter_link'    => 'twitter.com',
            'youtube_link'    => 'youtube.com',
            'pinterest_link'  => 'google.com',
            // 'zone_id'    => '1',
            'created_at' => now(),
        ] );
    }
}
