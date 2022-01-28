<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create( [
            'main_section_tittle'      => 'Welcome to GroceFusion',
            'main_section_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum. ',
            'main_section_image'       => 'About-main.png',
            'section2_tittle'          => 'Your Partner for e-commerce grocery solution',
            'section2_description'     => 'Ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto',
            'section2_image1'          => 'Our-performance.png',
            'who_description'          => 'Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.',
            'our_description'          => 'Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.',
            'mission_description'      => 'Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.',
            'created_at' => now(),
        ] );
    }
}
