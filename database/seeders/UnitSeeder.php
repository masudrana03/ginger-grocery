<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;

class UnitSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        

        $units = [
            [
                'name'       => 'gm',
                'created_at' => now(),
            ],

            [
                'name'       => 'kg',
                'created_at' => now(),
            ],

            [
                'name'       => 'ml',
                'created_at' => now(),
            ],

            [
                'name'       => 'L',
                'created_at' => now(),
            ]
        ];

        DB::table('units')->insert($units);
    }
}
