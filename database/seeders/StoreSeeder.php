<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Store;

class StoreSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {


        $stores = [
            [
                'name'            => "Better Bites Deli",
                'type'            => 'Bakery Shop',
                'image'           => 'vendor-6.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 4,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],

            [
                'name'            => "Food Festive",
                'type'            => 'Snacks Shop',
                'image'           => 'vendor-6.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 4,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],

            [
                'name'            => "Country Crock",
                'type'            => 'Cake Shop',
                'image'           => 'vendor-6.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 3,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],

            [
                'name'            => "Hambger Hel",
                'type'            => 'Fruit Shop',
                'image'           => 'vendor-7.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 3,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],

            [
                'name'            => "Green Grocery",
                'type'            => 'Vegetable',
                'image'           => 'vendor-6.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 3,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],

            [
                'name'            => "Farm House",
                'type'            => 'Meat Shop',
                'image'           => 'vendor-5.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 3,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],

            [
                'name'            => "Sea House",
                'type'            => 'Fish & Sea Food Shop',
                'image'           => 'vendor-3.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 3,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],

            [
                'name'            => "Food to Fly",
                'type'            => 'Fruit Shop',
                'image'           => 'vendor-4.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 3,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],

            [
                'name'            => 'Spice House',
                'type'            => 'Spices Shop',
                'image'           => 'vendor-1.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 3,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],


            [
                'name'            => "Organic Orchard",
                'type'            => 'Herbs and Organic Food Shop',
                'image'           => 'vendor-2.png',
                'phone'           => '+880 1712 112233',
                'established_at'  => '1952',
                'country_id'      => 3,
                'currency_id'     => 4,
                'state'           => 'Florida',
                'city'            => 'Miami',
                'zip'             => '33101',
                'address'         => '1255 Timbercrest Road',
                'description'     => "Got a smooth, buttery spread in your fridge? Chances are good that it's Good Chef. This brand made Lionto's list of the most popular grocery brands across the country.",
                'facebook_link'   => 'https://www.facebook.com/',
                'instagram_link'  => 'https://www.instagram.com/',
                'twitter_link'    => 'https://twitter.com/?lang=en',
                'youtube_link'    => 'https://www.youtube.com/',
                'pinterest_link'  => 'https://www.pinterest.com/',
                // 'zone_id'    => '1',
                'created_at' => now(),
            ],


        ];


        DB::table('stores')->insert($stores);
    }
}
