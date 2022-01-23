<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'banners' )->insert( [
            'title'      => 'Don’t miss amazing grocery deals',
            'body'       => 'Sign up for the daily newsletter',
            'image'      => 'slider-image-01.png',
            'created_at' => now(),
        ] );

        DB::table( 'banners' )->insert( [
            'title'      => 'Fresh Vegetables Big discount',
            'body'       => 'Save up to 50% off on your first order',
            'image'      => 'slider-image-02.png',
            'created_at' => now(),
        ] );
    }
}
