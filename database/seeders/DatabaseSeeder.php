<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Artisan::call( 'cache:clear' );

        $this->call( [
            CountrySeeder::class,
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
            CallToActionSeeder::class,
            ContactWithUsSeeder::class,
            ContactInfoSeeder::class,

        ] );

        Category::factory()
            ->has(
                Product::factory()->count( rand( 10, 25 ) ), 'products'
            )
            ->count( 15 )
            ->create();
    }
}
