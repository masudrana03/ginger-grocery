<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::create([
            'provider'     => 'google',
            'status'       => false,
            'redirect_url' => '/login/google/callback',
            'created_at'   => now(),
        ]);

        Social::create([
            'provider'     => 'facebook',
            'status'       => false,
            'redirect_url' => '/login/facebook/callback',
            'created_at'   => now(),
        ]);
    }
}
