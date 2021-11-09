<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            'title' => 'Gov Tax',
            'percentage' => '15',
            'created_at' => now(),
        ]);

        DB::table('taxes')->insert([
            'title' => 'low Tax',
            'percentage' => '05',
            'created_at' => now(),
        ]);
    }
}
