<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Currency;
class CurrencySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        

        $currencies = [
            [
                'name'       => 'USD',
                'symbol'     => '$',
                'created_at' => now(),
            ],

            [
                'name'       => 'Rs',
                'symbol'     => '₹',
                'created_at' => now(),
            ],

            [
                'name'       => 'BDT',
                'symbol'     => '৳',
                'created_at' => now(),
            ]

        ];

        DB::table('currencies')->insert($currencies);
    }
}
