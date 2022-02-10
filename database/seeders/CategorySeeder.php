<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        [
            'name'       => 'Beverages',
            'slug'       => Str::slug('Beverages'),
            'image'      => 'beverages.png',
            'created_at' => now(),
        ],

            
        [
            'name'       => 'Bakery',
            'slug'       => Str::slug('Bakery'),
            'image'      => 'bakery.png',
            'created_at' => now(),
        ],


        [
            'name'       => 'Canned & Jarred Goods',
            'slug'       => Str::slug('Canned & Jarred Goods'),
            'image'      => 'canned.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Frozen Foods',
            'slug'       => Str::slug('Frozen Foods'),
            'image'      => 'frozen.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Meat ',
            'slug'       => Str::slug('Meat'),
            'image'      => 'meat.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Baking Goods',
            'slug'       => Str::slug('Baking Goods'),
            'image'      => 'baking.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Fish',
            'slug'       => Str::slug('Fish'),
            'image'      => 'fish.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Fruits',
            'slug'       => Str::slug('Fruits'),
            'image'      => 'fruits.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Vegetables',
            'slug'       => Str::slug('Vegetables'),
            'image'      => 'vegetable.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Others',
            'slug'       => Str::slug('Others'),
            'image'      => 'other.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Spices',
            'slug'       => Str::slug('Spices'),
            'image'      => 'spice.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Home & Kitchen Essentials',
            'slug'       => Str::slug('Home & Kitchen Essentials'),
            'image'      => 'home&kitchen.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Beauty & Hygiene',
            'slug'       => Str::slug('Beauty & Hygiene'),
            'image'      => 'beauty.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Oil',
            'slug'       => Str::slug('Oil'),
            'image'      => 'oil.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'Baby Care',
            'slug'       => Str::slug('Baby Care'),
            'image'      => 'babycare.png',
            'created_at' => now(),
        ],

        [
            'name'       => 'CLEANING & HOUSEHOLD',
            'slug'       => Str::slug('CLEANING & HOUSEHOLD'),
            'image'      => 'household.png',
            'created_at' => now(),
        ],

        ];

        DB::table('categories')->insert($categories);
    }
}
