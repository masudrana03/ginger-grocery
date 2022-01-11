<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        PaymentMethod::create( [
            'provider'   => 'stripe',
            'status'     => true,
            'created_at' => now(),
        ] );
        
        PaymentMethod::create( [
            'provider'   => 'paypal',
            'created_at' => now(),
        ] );

        PaymentMethod::create( [
            'provider'   => 'cash',
            'status'     => true,
            'created_at' => now(),
        ] );
    }
}
