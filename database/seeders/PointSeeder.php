<?php

namespace Database\Seeders;

use App\Models\Point;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Point::create( [
            'purchase_target' => 1000,
            'points'          => 100,
        ] );
        Point::create( [
            'purchase_target' => 2000,
            'points'          => 200,
        ] );
        Point::create( [
            'purchase_target' => 3000,
            'points'          => 300,
        ] );
        Point::create( [
            'purchase_target' => 4000,
            'points'          => 400,
        ] );
        Point::create( [
            'purchase_target' => 5000,
            'points'          => 500,
        ] );
    }
}
