<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Artisan::call('cache:clear');

        $this->call([
            SettingSeeder::class,
            PaymentMethodSeeder::class,
            UserSeeder::class,
            BannerSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            UnitSeeder::class,
            NutritionSeeder::class,
            CurrencySeeder::class,
            StoreSeeder::class,
            ProductSeeder::class,
            OrderStatusSeeder::class,
            EmailTemplateSeeder::class,
            ShippingServiceSeeder::class,
            TaxSeeder::class,
            PointSeeder::class,
        ]);
    }
}
