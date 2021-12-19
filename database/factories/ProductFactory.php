<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'name'        => $this->faker->words( rand( 1, 4 ), true ),
            'description' => $this->faker->words( rand( 10, 50 ), true ),
            'excerpt'     => $this->faker->words( 12, true ),
            'price'       => rand( 15, 9999 ),
            'unit_id'     => 1,
            'brand_id'    => 1,
            'store_id'    => 1,
            'currency_id' => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ];
    }
}
