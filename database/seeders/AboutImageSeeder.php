<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutsliderImage;

class AboutImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => '2021-12-30-61cd9a69abdd7.png',
            'created_at' => now(),
        ] );

        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => '2021-12-30-61cd9a757d338.png',
            'created_at' => now(),
        ] );

        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => '2021-12-30-61cd9a801f7f7.png',
            'created_at' => now(),
        ] );

        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => '2021-12-30-61cd9a8bb1577.png',
            'created_at' => now(),
        ] );

        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => '2021-12-30-61cd9a979c57c.png',
            'created_at' => now(),
        ] );
    }
}
