<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->words( rand( 1, 4 ), true ),
            'type'        => $this->faker->words(),
            'image'       => $this->faker->words( 12, true ),
            'created_at'  => now(),
        ];
    }
}
