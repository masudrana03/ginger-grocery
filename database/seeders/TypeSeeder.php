<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            $types = [

                [
                    'name'       => 'Meat',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Fish',
                    'created_at' => now(),
                ],


                [
                    'name'       => 'Mutton',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Bakery',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Dairy',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Soft Drinks',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Bread',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Oil',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Breakfast',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Spices',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Cane',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Vegetables',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Fruits',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'seafood',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Grains',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'seeds',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'nuts',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Dry',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Water',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Herbs',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Legumes',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Grains',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Garnishes',
                    'created_at' => now(),
                ],

                [
                    'name'       => 'Others',
                    'created_at' => now(),
                ]


            ];

           Type::create($types);
        
    }
}
