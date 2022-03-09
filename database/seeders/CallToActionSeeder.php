<?php

namespace Database\Seeders;

use App\Models\CallToAction;
use Illuminate\Database\Seeder;

class CallToActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CallToAction::create( [
            'store_id'        => '2',
            'action_location' => 'Home slider Right 1st.',
            'action_tittle'   => 'Everyday Fresh & Clean with Our Products',
            'image'           => 'ads-image-01.png',
            'status'          => false,
            'created_at'      => now(),
        ] );

        CallToAction::create( [
            'store_id'        => '2',
            'action_location' => 'Home slider Right 2nd.',
            'action_tittle'   => 'The best Organic Products Online',
            'image'           => 'ads-image-02.png',
            'status'          => false,
            'created_at'      => now(),
        ] );

        CallToAction::create( [
            'store_id'        => '2',
            'action_location' => 'Middle Banner 1st',
            'action_tittle'   => 'Everyday Fresh & Clean with Our Products',
            'image'           => 'ads-image-03.png',
            'status'          => false,
            'created_at'      => now(),
        ] );

        CallToAction::create( [
            'store_id'        => '2',
            'action_location' => 'Middle Banner 2nd',
            'action_tittle'   => 'Make your Breakfast Healthy and Easy',
            'image'           => 'ads-image-04.png',
            'status'          => false,
            'created_at'      => now(),
        ] );

        CallToAction::create( [
            'store_id'        => '2',
            'action_location' => 'Middle Banner 3rd',
            'action_tittle'   => 'The best Organic Products Online',
            'image'           => 'ads-image-05.png',
            'status'          => false,
            'created_at'      => now(),
        ] );

        CallToAction::create( [
            'store_id'        => '2',
            'action_location' => 'Footer image',
            'action_tittle'   => 'The best Organic Products Online',
            'image'           => 'footer-image.png',
            'status'          => false,
            'created_at'      => now(),
        ] );
    }
}
