<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'products' )->insert( [
            'name'        => 'Product Name',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 100,
            'category_id' => Category::first()->id,
            'unit_id'     => Unit::first()->id,
            'brand_id'    => Brand::first()->id,
            'store_id'    => Store::first()->id,
            'currency_id' => Currency::first()->id,
            'user_id'     => User::first()->id,
            'created_at'  => now(),
        ] );

        DB::table( 'products' )->insert( [
            'name'        => 'Product Name 2',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 200,
            'category_id' => Category::first()->id,
            'unit_id'     => Unit::first()->id,
            'brand_id'    => Brand::first()->id,
            'store_id'    => Store::first()->id,
            'currency_id' => Currency::first()->id,
            'user_id'     => User::first()->id,
            'created_at'  => now(),
        ] );
    }
}
