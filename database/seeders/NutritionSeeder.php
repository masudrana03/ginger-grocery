<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Nutrition;

class NutritionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        

        $nutritions = [
            [

                'name' => 'Calcium',
                'created_at' => now(),
            ],

            [

                'name' => 'Potassium',
                'created_at' => now(),
            ],

            [

                'name' => 'Fiber',
                'created_at' => now(),
            ],

            [

                'name' => 'Magnesium',
                'created_at' => now(),
            ],

            [

                'name' => 'Vitamin A',
                'created_at' => now(),
            ],

            [

                'name' => 'Vitamin C',
                'created_at' => now(),
            ],

            [

                'name' => 'Vitamin E',
                'created_at' => now(),
            ],

            [

                'name' => 'carbohydrates ',
                'created_at' => now(),
            ],

            [

                'name' => 'protein ',
                'created_at' => now(),
            ],

            [

                'name' => 'fats ',
                'created_at' => now(),
            ],

            [

                'name' => 'fiber ',
                'created_at' => now(),
            ],

            [

                'name' => 'sodium ',
                'created_at' => now(),
            ],

            [

                'name' => 'minerals',
                'created_at' => now(),
            ],

            [

                'name' => 'Alcohol',
                'created_at' => now(),
            ],

            [

                'name' => 'Omega-3 fatty acids',
                'created_at' => now(),
            ],

            [

                'name' => ' Omega-6 fatty acids',
                'created_at' => now(),
            ],

            [

                'name' => 'Saturated Fat',
                'created_at' => now(),
            ],

            [

                'name' => 'Cholesterol',
                'created_at' => now(),
            ],

            [

                'name' => 'Caffeine',
                'created_at' => now(),
            ]
        ];

        DB::table('nutrition')->insert($nutritions);
    }
}
