<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Artisan::call( 'cache:clear' );

        $this->call( [
            SettingSeeder::class,
            PaymentMethodSeeder::class,
            StoreSeeder::class,
            UserSeeder::class,
            BannerSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            UnitSeeder::class,
            NutritionSeeder::class,
            CurrencySeeder::class,
            ProductSeeder::class,
            OrderStatusSeeder::class,
            EmailTemplateSeeder::class,
            ShippingServiceSeeder::class,
            TaxSeeder::class,
            PointSeeder::class,
        ] );
    }
}
