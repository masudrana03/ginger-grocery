<?php

namespace Database\Seeders;

use App\Models\ContactWithUs;
use Illuminate\Database\Seeder;

class ContactWithUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactWithUs::create( [
            'name'       => 'John Doe',
            'email'      => 'john@gmail.com',
            'phone'      => '01800000000',
            'subject'    => 'Test subject',
            'massage'    => 'This world is beautiful and it have many life form.',
            'created_at' => now(),
        ] );
    }
}
