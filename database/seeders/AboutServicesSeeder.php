<?php

namespace Database\Seeders;

use App\Models\AboutService;
use Illuminate\Database\Seeder;

class AboutServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutService::create( [
            'service_section_tittle1'       => 'Best Prices & Offers',
            'service_section_description1'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'service_section_tittle2'       => 'Wide Assortment',
            'service_section_description2'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'service_section_tittle3'       => 'Free Delivery',
            'service_section_description3'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'service_section_tittle4'       => 'Easy Returns',
            'service_section_description4'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'service_section_tittle5'       => '100% Satisfaction',
            'service_section_description5'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'service_section_tittle6'       => 'Great Daily Deal',
            'service_section_description6'  => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'created_at' => now(),
        ] );
    }
}
