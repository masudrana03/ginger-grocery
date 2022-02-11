<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $brands = [
            [
                'name'       => 'DAVID Seeds',
                'created_at' => now(),
            ],

            [
                'name'       => 'Country Crock',
                'created_at' => now(),
            ],

            [
                'name'       => 'Hamburger Helper',
                'created_at' => now(),
            ],

            [
                'name'       => 'Ramen Noodle Soup',
                'created_at' => now(),
            ],

            [
                'name'       => 'Dove Promises',
                'created_at' => now(),
            ],


            [
                'name'       => 'Lindt',
                'created_at' => now(),
            ],

            [
                'name'       => 'Snyders-Lance',
                'created_at' => now(),
            ],

            [
                'name'       => 'Coffee-Mate',
                'created_at' => now(),
            ],

            [
                'name'       => 'DiGiorno',
                'created_at' => now(),
            ],

            [
                'name'       => 'Bertolli',
                'created_at' => now(),
            ],

            [
                'name'       => 'Cocacola',
                'created_at' => now(),
            ]

        ];

        DB::table('brands')->insert($brands);


    }
}
