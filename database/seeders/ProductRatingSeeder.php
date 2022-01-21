<?php

namespace Database\Seeders;

use App\Models\ProductRating;
use Illuminate\Database\Seeder;

class ProductRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductRating::create( [
            'user_id'    => 1,
            'product_id' => 1,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 4,
        ] );

        ProductRating::create( [
            'user_id'    => 2,
            'product_id' => 1,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 4,
        ] );

        ProductRating::create( [
            'user_id'    => 3,
            'product_id' => 1,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 4,
        ] );

        ProductRating::create( [
            'user_id'    => 4,
            'product_id' => 1,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 4,
        ] );

        ProductRating::create( [
            'user_id'    => 5,
            'product_id' => 1,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 3,
        ] );

        ProductRating::create( [
            'user_id'    => 2,
            'product_id' => 5,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 3,
        ] );

        ProductRating::create( [
            'user_id'    => 3,
            'product_id' => 5,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 3,
        ] );

        ProductRating::create( [
            'user_id'    => 4,
            'product_id' => 5,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 3,
        ] );

        ProductRating::create( [
            'user_id'    => 5,
            'product_id' => 5,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 3,
        ] );

        ProductRating::create( [
            'user_id'    => 6,
            'product_id' => 1,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'    => 4,
        ] );

        ProductRating::create( [
            'user_id'    => 7,
            'product_id' => 5,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'    => 3,
        ] );

        ProductRating::create( [
            'user_id'    => 8,
            'product_id' => 5,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'    => 4,
        ] );

        ProductRating::create( [
            'user_id'    => 9,
            'product_id' => 5,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 5,
        ] );

        ProductRating::create( [
            'user_id'    => 10,
            'product_id' => 5,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 5,
        ] );

        ProductRating::create( [
            'user_id'    => 2,
            'product_id' => 4,
            'comment'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt?',
            'rating'     => 5,
        ] );
    }
}
