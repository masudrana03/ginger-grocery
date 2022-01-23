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
            'image'      => 'About-slider1.png',
            'created_at' => now(),
        ] );

        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => 'About-slider2.png',
            'created_at' => now(),
        ] );

        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => 'About-slider3.png',
            'created_at' => now(),
        ] );

        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => 'About-slider4.png',
            'created_at' => now(),
        ] );

        AboutsliderImage::create( [
            'about_id'   => '1',
            'image'      => 'About-slider5.png',
            'created_at' => now(),
        ] );
    }
}
