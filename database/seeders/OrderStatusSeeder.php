<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('order_statuses')->insert([
        //     'name'       => 'Accepted',
        //     'created_at' => now(),
        // ]);
        DB::table('order_statuses')->insert([
            'name'       => 'Order Placed',
            'created_at' => now(),
        ]);
        DB::table('order_statuses')->insert([
            'name'       => 'Processing',
            'created_at' => now(),
        ]);
        // DB::table('order_statuses')->insert([
        //     'name'       => 'Picked up',
        //     'created_at' => now(),
        // ]);
        DB::table('order_statuses')->insert([
            'name'       => 'Product On The Way',
            'created_at' => now(),
        ]);
        DB::table('order_statuses')->insert([
            'name'       => 'Delivered',
            'created_at' => now(),
        ]);
        // DB::table('order_statuses')->insert([
        //     'name'       => 'Canceled',
        //     'created_at' => now(),
        // ]);
        // DB::table('order_statuses')->insert([
        //     'name'       => 'Payment Failed',
        //     'created_at' => now(),
        // ]);
    }
}
