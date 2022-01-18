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
            'image'      => 'beverages.png',
            'created_at' => now(),
        ],

            
        [
            'name'       => 'Bakery',
            'image'      => 'bakery.png',
            'created_at' => now(),
        ],


        [
            'name'       => 'Canned & Jarred Goods',
            'image'      => 'canned.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Frozen Foods',
            'image'      => 'frozen.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Meat ',
            'image'      => 'meat.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Baking Goods',
            'image'      => 'baking.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Fish',
            'image'      => 'fish.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Fruits',
            'image'      => 'fruits.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Vegetables',
            'image'      => 'vegetable.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Others',
            'image'      => 'other.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Spices',
            'image'      => 'spice.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Home & Kitchen Essentials',
            'image'      => 'home&kitchen.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Beauty & Hygiene',
            'image'      => 'beauty.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Oil',
            'image'      => 'oil.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Baby Care',
            'image'      => 'babycare.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'CLEANING & HOUSEHOLD',
            'image'      => 'household.png',
            'created_at' => now(),
        ],

        ];

        DB::table('categories')->insert($categories);
    
    }
}
