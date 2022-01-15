<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
       $categories = [
        [
            'name'       => 'Beverages',
            'image'      => 'Beverages.png',
            'created_at' => now(),
        ],

            
        [
            'name'       => 'Bread/Bakery',
            'image'      => 'Bakery.png',
            'created_at' => now(),
        ],


        [
            'name'       => 'Canned/Jarred Goods',
            'image'      => 'Canned.jpg',
            'created_at' => now(),
        ],

        [
            'name'       => 'Frozen Foods',
            'image'      => 'Frozen.jpg',
            'created_at' => now(),
        ],

        [
            'name'       => 'Meat ',
            'image'      => 'meats.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Dry/Baking Goods',
            'image'      => 'dry.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Fish',
            'image'      => 'Fish.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Fruits',
            'image'      => 'Fruits.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Vegetables',
            'image'      => 'Vegetables.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Others',
            'image'      => 'others.png',
            'created_at' => now(),
        ],

        ];

        DB::table('categories')->insert($categories);
    
    }
}
