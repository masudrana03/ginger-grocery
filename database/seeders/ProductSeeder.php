<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {


       $products = [

        // Shop name: Better Bites Deli(1)

        [
            'name'        => 'Milk Bread',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 2,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 1,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Muffin Cake',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 1,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 2,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Dalla Lollipop Confectionery',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 2,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 3,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Diet Wheat Rusk',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 4,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 4,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Jeera Toast',
            'description' => 'We are one of the reliable suppliers for bakery products. The products are manufactured with high quality ingredients & in a hygienic condition.
            The unique manufacturing process is carried out in such a way that it gives the ultimate taste, purity, freshness & quality baked product.
            Our variety comprises of Jeera',
            'excerpt'     => 'This is product excerpt',
            'price'       => 6,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 5,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Pooja Multigrain Toast',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 2,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 6,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],
        [
            'name'        => 'Premium Suji Toast',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 9,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 7,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],
        [
            'name'        => 'Alif Bakers Choco Chips Cookies',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 10,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 8,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],
        [
            'name'        => 'Cocoa Butter Chocolate Chip',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 5,
            'category_id' => 2,
            'unit_id'     => 1,
            'brand_id'    => 9,
            'store_id'    => 1,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        // shop name(2): Food Festive

        [
            'name'        => 'CHEESE CRACKERS',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 10,
            'unit_id'     => 1,
            'brand_id'    => 1,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'BUTTER POTATO STICKS',
            'description' => 'Jagabee Shoyu Butter Potato Sticks are a tasty snack that can be enjoyed any time of the day. These thin crisps are made from potatoes and shaped into thin sticks to make them easier for you to hold. They are flavored with shoyu, a traditional Japanese soy sauce used as a flavoring agent, and rich melted butter to make them taste delicious. They also come packaged in a resealable bag so you can keep fresh and crunchy. ',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 10,
            'unit_id'     => 1,
            'brand_id'    => 2,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Meltykiss Tahiti Vanilla',
            'description' => 'This is a luxurious, limited edition Meltykiss chocolate. It is made with high-quality chocolate and a familiar Tahiti vanilla. Filling the heart with a snowy texture and richness, this is a recognizable but high-quality classic winter chocolate that will bring happiness to "me" and "my loved ones.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 10,
            'unit_id'     => 1,
            'brand_id'    => 3,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Pringles Napoli Flavor',
            'description' => 'In pursuit of the pizza flavor that has become a standard at restaurants and take-out restaurants, we have combined several herbs to create a pizza-like flavor. We fused it with four types of cheese: cheddar, cream, mozzarella, and parmesan. The combination of herbs and cheeses creates a satisfying taste that is so abundant you can almost smell the aroma of mozzarella.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 4.99,
            'category_id' => 10,
            'unit_id'     => 1,
            'brand_id'    => 4,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'SLIM UP DIET CHOCOLATE SHAKE',
            'description' => 'Have you ever thought that beauty can be eaten? Slim Up Slim is a diet and beauty meal alternative shake with beauty ingredients. Just drink one serving in place of a regular meal, or along with your usual meals, and you can lose weight and enhance your beauty just by drinking. The Slim Up Slim Diet Chocolate Shake contains 60g of carbohydrates, only 9g of sugar. A full days intake of beauty ingredients such as collagen, vitamin C, and vitamin E helps to improve the skin and care for it. Rich chocolate flavor with a nutritional balance is a good meal alternative shake and a breakfast capable of setting up your whole day!',
            'excerpt'     => 'This is product excerpt',
            'price'       => 19.12,
            'category_id' => 10,
            'unit_id'     => 1,
            'brand_id'    => 5,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'JAPAN FLAVORS HI CHEW SOFT CANDY',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 2.12,
            'category_id' => 10,
            'unit_id'     => 1,
            'brand_id'    => 6,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'JAGABEE SHOYU BUTTER POTATO STICKS',
            'description' => 'Jagabee Shoyu Butter Potato Sticks are a tasty snack that can be enjoyed any time of the day. These thin crisps are made from potatoes and shaped into thin sticks to make them easier for you to hold. They are flavored with shoyu, a traditional Japanese soy sauce used as a flavoring agent, and rich melted butter to make them taste delicious. They also come packaged in a resealable bag so you can keep fresh and crunchy. .',
            'excerpt'     => 'This is product excerpt',
            'price'       => 6.30,
            'category_id' => 10,
            'unit_id'     => 1,
            'brand_id'    => 7,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Hi Mountain Seasoning for Bacon',
            'description' => 'This snack is made with corn grown in Hokkaido. Its roasted at a high temperature, making it crunchy and tasty. Almonds are also added to the mix for a change in texture and taste. Glico created this snack to be eaten with a nice beer, but we think these taste great with all drinks',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.09,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 8,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'KIT KAT - PATISSIER APPLE PIE FLAVOR',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.12,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 9,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'PRETZ SWEET ROAST FLAVOR PRETZEL STICKS',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 10,
            'store_id'    => 2,
            'user_id'     => 1,
            'created_at'  => now(),
        ],


        //shop name(3) :

        [
            'name'        => 'CHEEZA CHEESE CRACKERS ',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 1,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Utz Potato Stix',
            'description' => 'Jagabee Shoyu Butter Potato Sticks are a tasty snack that can be enjoyed any time of the day. These thin crisps are made from potatoes and shaped into thin sticks to make them easier for you to hold. They are flavored with shoyu, a traditional Japanese soy sauce used as a flavoring agent, and rich melted butter to make them taste delicious. They also come packaged in a resealable bag so you can keep fresh and crunchy. ',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 2,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Vanilla Keto Cake ',
            'description' => 'This is a luxurious, limited edition Meltykiss chocolate cake. It is made with high-quality chocolate and a familiar Tahiti vanilla. Filling the heart with a snowy texture and richness, this is a recognizable but high-quality classic winter chocolate that will bring happiness to "me" and "my loved ones.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 3,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Pringles Paprika',
            'description' => 'In pursuit of the pizza flavor that has become a standard at restaurants and take-out restaurants, we have combined several herbs to create a pizza-like flavor. We fused it with four types of cheese: cheddar, cream, mozzarella, and parmesan. The combination of herbs and cheeses creates a satisfying taste that is so abundant you can almost smell the aroma of mozzarella.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 4.99,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 4,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'DIET CHOCOLATE SHAKE',
            'description' => 'Have you ever thought that beauty can be eaten? Slim Up Slim is a diet and beauty meal alternative shake with beauty ingredients. Just drink one serving in place of a regular meal, or along with your usual meals, and you can lose weight and enhance your beauty just by drinking. The Slim Up Slim Diet Chocolate Shake contains 60g of carbohydrates, only 9g of sugar. A full days intake of beauty ingredients such as collagen, vitamin C, and vitamin E helps to improve the skin and care for it. Rich chocolate flavor with a nutritional balance is a good meal alternative shake and a breakfast capable of setting up your whole day!',
            'excerpt'     => 'This is product excerpt',
            'price'       => 19.12,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 5,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Morinaga Hi-Chew Soft candy',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 2.12,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 6,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Puffworks Baby Organic Peanut Butter Puffs',
            'description' => 'Puffworks Baby Organic Peanut Butter Puffs are a tasty snack that can be enjoyed any time of the day. These thin crisps are made from potatoes and shaped into thin sticks to make them easier for you to hold. They are flavored with shoyu, a traditional Japanese soy sauce used as a flavoring agent, and rich melted butter to make them taste delicious. They also come packaged in a resealable bag so you can keep fresh and crunchy. .',
            'excerpt'     => 'This is product excerpt',
            'price'       => 6.30,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 7,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Mills Gourmet Original Bacon Pepper Jelly',
            'description' => 'This snack is made with corn grown in Hokkaido. Its roasted at a high temperature, making it crunchy and tasty. Almonds are also added to the mix for a change in texture and taste. Glico created this snack to be eaten with a nice beer, but we think these taste great with all drinks',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.09,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 8,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Kit kat chocolate strawberry',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.12,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 9,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Happy Belly Pretzel Sticks',
            'description' => 'This is product description.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 1,
            'unit_id'     => 1,
            'brand_id'    => 10,
            'store_id'    => 3,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        // shop no 4 :
        [
            'name'        => 'Fresh Baby Apple Shimla',
            'description' => 'Baby Apples are the mini blush red apples with slight yellow streaks and has a smooth texture.
            The apple flesh is greenish white and grained, and it tastes sweet and juicy. The crispiness and the aroma of the apples make it more attractive.
            Apples are best when it is consumed fresh after meals or as a healthy snack for kids.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 10,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresh Pomegranate',
            'description' => 'With ruby color and an intense floral, sweet-tart flavor, the pomegranate delivers both taste and beauty.
            You can remove the skin and the membranes to get at the delicious fruit with nutty seeds.
            Fresho Pomegranates are finely sorted and graded to deliver the best tasting pomegranates to you.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Kiwi - Green',
            'description' => 'Kiwis are oval shaped with a brownish outer skin. The flesh is bright green and juicy with tiny, edible black seeds. With its distinct sweet-sour taste and a pleasant smell, it tastes like strawberry and honeydew melon.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 13.2,
            'category_id' =>8,
            'unit_id'     => 2,
            'brand_id'    => 2,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Dates - Kimia, with Seed',
            'description' => 'Plump and fibrous, brownish-black coloured oval dates taste like honey and just melt in the mouth. Taiba dates are fleshy which are rich source of iron and a healthy snack.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.39,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 3,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Sapota - Organically Grown',
            'description' => 'Brown skinned sapotas are smooth to grainy textured, musky-scented and deliciously sweet in taste.
            The flesh generally contains 2-3 large and inedible black seeds.
            Fresho sapotas are freshly plucked by our farmers who grow it organically and the best quality is delivered to you.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 4.99,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 4,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Dragon Fruit',
            'description' => 'Dragon fruits are oval to oblong in shape and size, with pink peel and green scale-like leaves. It is named after its resemblance to dragon scales. White flesh is dotted with black, tiny edible seeds. It has juicy and spongy flesh with sweet flavour and a hint of sourness. Fresho dragon fruits are sourced from Thailand.',
            'excerpt'     => 'This is product excerpt',
            'price'       => 19.12,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 5,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Muskmelon - Netted Small',
            'description' => 'Having a netlike/ reticulated skin covering, its a round melon with firm, orange, moderately sweet flesh and a thin, reticulated, light-grey rind.
            Do not forget to check our delicious fruit recipe - https://www.bigbasket.com/cookbook/recipes/1817/cantaloupe-juice-muskmelon-juice/',
            'excerpt'     => 'This is product excerpt',
            'price'       => 2.12,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 6,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Avocado ',
            'description' => 'mported avocados come with an irresistible buttery flavour. They have a unique-textured, creamy and light green flesh with a special aroma. Avocados are also known as an alligator pear or butter fruit.
            Do not forget to check our delicious fruit recipe - https://www.bigbasket.com/cookbook/recipes/2205/chatpate-green-noodles/
            Ripe Avocados turn dark brown or Black in colour. Any small black spots on the fruit is due to abrasion during harvesting or handling and does not affect the quality of the fruit',
            'excerpt'     => 'This is product excerpt',
            'price'       => 6.30,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 7,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Strawberry',
            'description' => 'Extremely juicy and syrupy, these conical heart shaped fruits have seeds on the skin that give them a unique texture. With a blend of sweet-tart flavour, these are everyone s favourite berries.
            Do not forget to check our delicious fruit recipe - https://www.bigbasket.com/cookbook/recipes/970/strawberry-cheesecake/',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.09,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 8,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Blueberry',
            'description' => 'Plump, smooth-skinned and indigo coloured perfect little globes of juicy berries have mostly sweet and slightly tart flavour. We have imported this fine quality, delicious tasting variety of blueberries.
            Do not forget to check our delicious fruit recipe - https://www.bigbasket.com/cookbook/recipes/564/blueberry-mousse/',
            'excerpt'     => 'This is product excerpt',
            'price'       => 3.12,
            'category_id' => 8,
            'unit_id'     => 2,
            'brand_id'    => 9,
            'store_id'    => 4,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        // store 5
        [
            'name'        => 'Fresho Tomato - Local',
            'description' => 'Local tomatoes are partly sour and partly sweet and contain many seeds inside which are edible. The red colour present in tomatoes is due to lycopene, an anti-oxidant.
            Do not forget to check out our delicious recipe- https://www.bigbasket.com/cookbook/recipes/935/tomato-chutney-for-dosa-and-idly/',
            'excerpt'     => 'Fresho Tomato - Local',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Carrot - Orange',
            'description' => 'A popular sweet-tasting root vegetable, Carrots are narrow and cone shaped.
            They have thick, fleshy, deeply colored root, which grows underground, and feathery green leaves that emerge above the ground.
            While these greens are fresh tasting and slightly bitter, the carrot roots are crunchy textured with a sweet and minty aromatic taste.
            Fresho brings you the flavour and richness of the finest crispy and juicy carrots that are locally grown and the best of the region.
            Do not forget to check our delicious recipe - https://www.bigbasket.com/cookbook/recipes/912/carrot-halwa/',
            'excerpt'     => 'Carrot - Orange',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 2,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Cucumber',
            'description' => 'English cucumber is a variety of seedless cucumber that is longer and slimmer than other varieties and have a higher water content. They do not have a layer of wax on them, and the skin is tender when ripe.
            Do not forget to check our delicious recipe - https://www.bigbasket.com/cookbook/recipes/2231/cucumber-lemon-detox-water/',
            'excerpt'     => 'Fresho Cucumber',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 3,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Chow Chow',
            'description' => 'Known wordlwide for its delicious seeds, roots, shoots, flowers, leaves and fruit, Chow chow also known as Chayote, is a roughly pear-shaped, mild flavoured and green vegetable.',
            'excerpt'     => 'Fresho Chow Chow',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 4,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Curry Leaves',
            'description' => 'Curry leaves are an essential element of Indian cooking style where numerous of the traditional and modern recipes are imperfect without curry leaves.
            These are used as tasting agent in food for its different taste.With dark green and glossy appearance, curry leaves have a strong flavour and release a tasty aroma when fried in hot oil.
            Do not forget to check our delicious recipe - https://www.bigbasket.com/cookbook/recipes/742/curryleaves-lemonade//',
            'excerpt'     => 'Fresho Curry Leaves',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 5,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Broccoli',
            'description' => 'With a shape resembling that of a cauliflower, Brocollis have clusters of small, tight flower heads. These heads turn bright green on cooking and tastes slightly bitter.
            Do not forget to check our delicious recipe - https://www.bigbasket.com/cookbook/recipes/1695/broccoli-masala/',
            'excerpt'     => '',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 6,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Capsicum - Green',
            'description' => 'Leaving a moderately pungent taste on the tongue, Green capsicums, also known as green peppers are bell shaped, medium-sized fruit pods.
            They have thick and shiny skin with a fleshy texture inside.',
            'excerpt'     => 'Fresho Capsicum - Green',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 7,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Beans - Haricot',
            'description' => 'Haricot beans are small, oval, plump and creamy-white with a mild flavour and a smooth, buttery texture.Haricot beans are great for metabolism and regulation of the sugar level of blood.They support the adrenal regulation function and provide an excellent source of protein and fibre.',
            'excerpt'     => 'Fresho Beans - Haricot',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 8,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Lettuce - Iceberg',
            'description' => 'Iceberg lettuce is a variety of lettuce with crisp leaves which grows in a spherical head resembling a cabbage. The leaves on the outside tend to be green and the leaves in the center go from pale yellow to nearly whitish as you move closer and closer to the center of the head with the sweetest leaves in the center of the head.',
            'excerpt'     => 'Lettuce - Iceberg',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 9,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],
        [
            'name'        => 'Fresho Dill Leaves',
            'description' => 'Green, flimsy and fernlike Dill leaves have a strong aroma. sharp tang and a spongy sugary flavour. Dill leaves are rich in nutritional value. They help enhance digestion, prevent insomnia, manage diabetes. Regular addition of Dill leaves in your diet will help you on the long run. You can also make dill pickles and use it as a healthy accompaniment.',
            'excerpt'     => 'Fresho Dill Leaves',
            'price'       => 2,
            'category_id' => 9,
            'unit_id'     => 2,
            'brand_id'    => 10,
            'store_id'    => 5,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

       //store 6
        [

            'name'        => 'Chilli Chicken Pieces - Boneless',
            'description' => 'Chicken is a lean meat with various health benefits. Packed with nutritional values, chicken is supremely advantageous for your body. Filled with vitamin, mineral and protein, chicken promotes brain development, strengthens your bones, aids in weight loss, builds muscle and helps in a healthy heart. 

            Now making chilli chicken at home is a hassle-free process. This chicken is perfectly cut and boneless. ',
            'excerpt'     => 'Antibiotic Residue-Free, 250 g',
            'price'       => 2,
            'category_id' => 5,
            'unit_id'     => 1,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [

            'name'        => 'Chicken Mince',
            'description' => 'hicken is a lean meat with various health benefits. Packed with nutritional values, chicken is supremely advantageous for your body. Filled with vitamin, mineral and protein, chicken promotes brain development, strengthens your bones, aids in weight loss, builds muscle and helps in a healthy heart. 
            Looking for a little cooking adventure? This minced chicken from Fresho will surely take out the chef in you. Get creative with your culinary talent with this perfectly chopped boneless chicken pieces. From your favourite subs to Indian keema, enjoy delicious dishes with Fresho minced Chicken. The quantity is perfect for 2-3 people. ',
            'excerpt'     => 'Antibiotic Residue Free',
            'price'       => 22,
            'category_id' => 5,
            'unit_id'     => 1,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Chicken Leg',
            'description' => 'Chicken is a lean meat with various health benefits. Packed with nutritional values, chicken is supremely advantageous for your body. Filled with vitamin, mineral and protein, chicken promotes brain development, strengthens your bones, aids in weight loss, builds muscle and helps in a healthy heart.
            This whole chicken leg without skin comes 2-3 pieces that are sufficient for 2-3 people. This super tender, succulent, and very flavorful pieces are an excellent source of iron and zinc. This is perfect for curries, biriyanis and barbeque. ',
            'excerpt'     => 'Without Skin, Antibiotic Residue-Free',
            'price'       => 12,
            'category_id' => 5,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Chicken Hariyali Lollipop',
            'description' => 'Chicken Hariyali  Lollypop  Recipe is a lip-smacking appetizer made with green masala thus the name “Hariyali”. The masala is made from a blend of mint leaves and coriander leaves that is spiced with an array of spice powders. Marinating the Chicken Lollypop for a long period of time to develop enough flavour is the key here. (Serving 1-2 People) (Preparation Time 15 -20 Min)',
            'excerpt'     => 'Chicken Hariyali Lollipop - Pre Marinated, Ready To Cook',
            'price'       => 43,
            'category_id' => 5,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'BBQ Pepper Exotic Chicken Wings',
            'description' => 'Fresho brings to you a range of marinated food items. This BBQ Pepper Exotic Chicken Wings that is marinated in BBQ Pepper marinade seasoning . Now eating your favourite fish steaks is easy. You just need to cook it for few minutes and its ready to eat. It is made with natural ingredients and without ant preservatives.',
            'excerpt'     => 'Chicken Wings With Skin - Pre Marinated, Ready To Cook',
            'price'       => 23,
            'category_id' => 5,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],


        [
            'name'        => 'Chicken Biryani Cut 1kg',
            'description' => 'Fresho Chicken - Biriyani Cut 1 kg

            Chicken is lean meat with various health benefits. Packed with nutritional values, chicken is supremely advantageous for your body. Filled with vitamins, minerals and protein, chicken promotes brain development, strengthens your bones, aids in weight loss, builds muscle and helps in a healthy heart. ',
            'excerpt'     => 'Chicken Biryani Cut 1kg + Chicken Chilli Pieces Boneless ',
            'price'       => 6,
            'category_id' => 5,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Mutton Lamb',
            'description' => 'Fresho Mutton Lamb - Mince is used to cook a variety of dishes like curries, fried dishes, keema, sausages, salami or added in the rolls, biryani or sandwiches.it is commonly and mostly consumed meat all over the world by people because of its high protein level, high iron level and low-fat level. Get soft and tender ready to cook mutton mince for that perfect keema. It is tender, and convenient to cook with just one wash. This mince delivered are hygienically processed & packed with the required temperature control condition. It passes several quality checks to make the meat safe to consume. Cut from the best end of the lamb, tender, moist and full of delightful flavours. Mince won’t be your fallback anymore with this beauty. Ground lamb meat from the hind legs will not only eloquently elevate your red meat culinary adventures but also do justice to the versatility of your recipes. Allow this pure meat mince to inspire you to create more than you ever have.',
            'excerpt'     => 'Fresho Mutton Lamb - Mince, Juicy & Tender',
            'price'       => 12,
            'category_id' => 5,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Tandori Chicken Platter',
            'description' => 'Tandoori chicken is a chicken dish prepared by roasting chicken marinated in spices in a tandoor, a cylindrical clay oven. The dish originated from North India. subcontinent and is popular in many other parts of the world. (Serving 1-2 People) (Preparation Time 14-20 Min) (Whole Chicken Curry Cut Without Skin  40 g per Piece Comes with  5-6 pcs)
            Fresho Peri-Peri Chicken Wings - Juicy & Fresh 1 Kg',
            'excerpt'     => 'Fresho Tandoori Chicken - Juicy 250 g',
            'price'       => 9,
            'category_id' => 5,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fresho Tandoori Chicken Drumstick',
            'description' => 'Fresho Tandoori Chicken Drumstick is a chicken dish prepared by roasting chicken marinated in spices in a tandoor, a cylindrical clay oven. The dish originated from North India. subcontinent and is popular in many other parts of the world. (Serving 4-6 People) (Preparation Time 14- 20 min) (Whole Chicken Curry Cut Without Skin 40 gm per Piece Comes with  20-24 pcs)',
            'excerpt'     => 'Fresho Tandoori Chicken Drumstick',
            'price'       => 11,
            'category_id' => 5,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Signature Pork - Streaky Bacon',
            'description' => 'Goldi Finest Streaky Bacon is manufractured in Srilanka, made from Pork leg brined and cured. It is carefully trimmed and then naturally smoked to perfection. The ham is cured over a mixture of hickory and applewood chips for up to 30 hours. The smoking process gives it a natural smoky flavour that infuses every morsel of the ham. Manufactured at Srilanka. Packed as per Customer requirement. Not a standard pack under weights & Measurement Guidelines. Consume within 05 days from date of Packing. Store in refrigerator at or below 05 degree C in an airtight container.',
            'excerpt'     => 'Signature Pork - Streaky Bacon, Sliced',
            'price'       => 22 ,
            'category_id' => 5,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 6,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

    //    store 7

        [
            'name'        => 'White Prawns',
            'description' => 'Prawns are full of nutrients. They are packed with protein and low in carbohydrate. It helps to build muscle and aids in weight-loss.The Fresho seawater prawns can be used instantly to cook a variety of delicious dishes without going through the pain of cleaning and deveining them. These seawater prawns are unpeeled. Their firm meat is easy to cook whether you are preparing curries, fried snacks, or grilled items. This comes in 50-60 pieces which are perfect for 6-8 people.Fresho is our in-house brand of fresh meat, poultry, and seafood. We take utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene.',
            'excerpt'     => ' White Prawns - Medium, Unpeeled, 30-40 pcs',
            'price'       => 34,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Yellow Fin Tuna ',
            'description' => 'Found mostly in the western and southern coasts of India, the yellowfin tuna is popular with seafood lovers. With deep red flesh that turns tan when cooked, the fish is popularly consumed fried. Its moist, firm yet flaky flesh can also be enjoyed raw in sushi or sashimi. Fresho takes utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene.',
            'excerpt'     => 'Yellow Fin Tuna - Curry Cut, Fresh, Cleaned & Succulent',
            'price'       => 54,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 2,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],


        [
            'name'        => 'Fresho Mackerel Fish - Large, Whole Cleaned',
            'description' => 'Mackerel fish is perfect for people who are watching their weights. The high nutritional value makes it a perfect addition to the diet. It can be grilled, steamed or baked. This whole cleaned mackerel fish comes with the head. It is cleaned and gutted. This comes in 3-4 pcs which are perfect for 3-4 people. It is preservative-free. Fresho is our in-house brand of fresh meat, poultry, and seafood. We take utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene.',
            'excerpt'     => 'Fresho Mackerel Fish - Large, Whole Cleaned',
            'price'       => 43,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 3,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Seer Fish ',
            'description' => 'Seer fish is known for its great taste and different health benefits. It is one of the favourite fish in the south. It is used to made different delicacy including fish pickles. Seer fish is good for the heart and has a rich content of Omega-3 fatty acids. This Fresho Seer Fish Large Steaks sliced seer fish comes without the head. It is cleaned and gutted. This comes in 6-8 pcs which are perfect for 6-8 people. Fresho takes utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene.',
            'excerpt'     => 'Fresho Seer Fish - Large Steaks, Fresh & Flavourful',
            'price'       => 34,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 4,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Big Sams Frozen Salmon',
            'description' => 'Salmon Skin-on Portions makes the perfect meal for 2. It contains nutritious Omega-3 fatty acids, Salmon is one of the healthiest proteins one can eat. It is flown in directly from Norway, so it is never too far from its date of production. Perfect for grilling.',
            'excerpt'     => 'Big Sams Frozen Salmon Skin-on Portions',
            'price'       => 11,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 5,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Golden Prize Canned Sardine in Natural Oil',
            'description' => 'Premium Quality Fish. Imported from Thailand.Excellent source of Omega 3.Its a non vegetarian product.',
            'excerpt'     => 'Golden Prize Canned Sardine in Natural Oil',
            'price'       => 21,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 6,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Black Pomfret',
            'description' => 'Black Pomfret is a butterfish which is known for its amazing taste. It is considered a delicacy and can be cooked in different ways. Not only taste but also it is known for its beneficial value. These fishes are great for hearts, protects joints and improves eyesight.This whole cleaned black pomfret fish comes without the head. It is cleaned and gutted. This comes in 2-3 pcs which are perfect for 2-3 people. It is preservative-free.Fresho is our in-house brand of fresh meat, poultry, and seafood. We take utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene.',
            'excerpt'     => 'Black Pomfret - Whole Cleaned, Preservative Free',
            'price'       =>52,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 7,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Yellofin Tuna Steaks',
            'description' => 'Found mostly in the western and southern coasts of India, the yellowfin tuna is popular with seafood lovers. With deep red flesh that turn tan when cooked, the fish is popularly consumed fried. Its moist, firm yet flaky flesh can also be enjoyed raw in sushi or sashimi. Fresho take utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene.',
            'excerpt'     => 'Yellofin Tuna Steaks',
            'price'       => 22,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 8,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],
        [
            'name'        => 'Pink Perch Fish',
            'description' => 'Pink Perch fish has got tender meat and packed with DHA. It holds a mild taste once cooked. With a really less body fat, this one can be categorized as lean fish. So, it is perfect if you are watching your weight.
            This whole cleaned pink perch comes with the head. It is cleaned and gutted. This comes in 3-4 pcs which are perfect for 3-4 people. It is preservative-free.

            Fresho is our in-house brand of fresh meat, poultry, and seafood. We take utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene. The product weighed before cleaning and cutting. Net weight will be lower at the time of delivery because of cleaning and Processing weight loss.',
            'excerpt'     => 'Pink Perch Fish - Whole Cleaned, Preservative Free',
            'price'       => 44,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 9,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],
        [
            'name'        => 'Fresh Sardine Fish',
            'description' => 'The fresh Sardine Fish from Fresho is available whole and cleaned. Also known as Kavalu, Mathi, or Chalai, this fish has a rich flavour and is characteristically soft. Sardines are also a powerhouse of nutrients such as Omega-3 fatty acids, proteins, minerals, vitamins, and calcium. Fresho takes utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene.',
            'excerpt'     => 'Fresho Fresh Sardine Fish - Whole Cut, Cleaned',
            'price'       => 21.32,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 10,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],


        [
            'name'        => 'Squid - Medium',
            'description' => 'Fresho Meats is our in house brand of fresh meat, poultry and seafood. We take utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene. Additionally, every product is packed using food grade plastic which provides a nourishing and wholesome environment.',
            'excerpt'     => 'Squid - Medium',
            'price'       => 26,
            'category_id' => 7,
            'unit_id'     => 2,
            'brand_id'    => 1,
            'store_id'    => 7,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        // shop 8

        [
            'name'        => 'BB Royal Cardamom Green',
            'excerpt'     => 'BB Royal Cardamom Green/Elakki, 50 g',
            'description' => 'Cardamom is a spice made from plants in the genera Elettaria and Amomum in the family Zingiberaceae. They are recognised by their small seed pods, triangular in cross-section and spindle-shaped, with a thin, papery outer shell and small black seeds. It is free from synthetic chemicals and pesticides.',
            'price'       => 7,
            'brand_id'    => 1,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Royal Organic - Bay Leaf/Lavangada',
            'excerpt'     => 'BB Royal Organic - Bay Leaf/Lavangada Ele, 20 g',
            'description' => 'Organic Bay leaf leaves are strong and contain a sharp, bitter taste. Premium Quality Bay leaves(Tej Patta) pure, free from impurities with sharp fragrant flavor. Clean or dried bay leaves are utilized in cooking for their distinctive taste and fragrance. The flavour is strengthened with the length of cooking time. Bay leaves are rich in vitamin b, vitamin c, copper, potassium, calcium and manganese and are for heart and kidney health.',
            'price'       => 2,
            'brand_id'    => 2,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Cumin/Jeera/Jeerige',
            'excerpt'     => 'BB Royal Cumin/Jeera/Jeerige - Whole, 200 g Pouch',
            'description' => 'Cumin seeds are an important kitchen staple, finds worldwide usage in various culinary - Indian, Mexican and Eastern and have major health benefits. Good for nursing mothers and pregnant as rich in iron, calcium and promotes lactation. Cumin in raw, powdered or oil form is an amazing spice. Bring home health by purchasing the cumin seeds. Superior quality Cumin seeds are powdered using flavour lock technology to ensure a delightful bouquet and distinctive flavour. It is a widely used spice that adds a mouth-watering taste to the food.',
            'price'       => 8,
            'brand_id'    => 3,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Mustard/Sasive/Rai',
            'excerpt'     => 'BB Royal Mustard/Sasive/Rai - Small, 200 g',
            'description' => 'Mustards are an integral part of the kitchen spices. Used mainly for seasoning in any Indian dish. Releases a wonderful aroma making the dish taste perfect and making it look complete. Be it chutneys or dhoklas or curries, mustard seeds are a must. You can add this mustard to any Indian curry to enhance its taste. Use it with other spices as part of youre spice-mix or make a paste for everyday use.',
            'price'       => 9,
            'brand_id'    => 4,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Chilli - Guntur with Stem',
            'excerpt'     => 'Royal Chilli - Guntur with Stem, 200 g',
            'description' => 'Red Chilli is a well-known spice for its flavour and aroma. Finest grade Chillies are carefully handpicked, dried and packed in a very hygienic condition to ensure the superior quality. These chilies are renowned all over the world for their pungency and colour. A moderate amount of Mirch can bring out the best flavour in your dish. Although these chilies have a unique sharpness and taste.',
            'price'       => 12,
            'brand_id'    => 5,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Fenugreek/Methi/Menthya',
            'excerpt'     => 'BB Popular Fenugreek/Methi/Menthya, 200 g',
            'description' => 'Fenugreek is primarily used as a culinary spice. It brings you the finest selection of methi seeds, which are non for their immense health benefits. These seeds are bitter in taste but lose their bitterness when roasted a little. It is loaded with health benefits, the methi seeds are hygienically packed to ensure they retain their natural goodness and aroma. These seeds can also be used in pureed form for hair growth. It also enhances many liver and heart functions and purifies the blood.',
            'price'       => 2,
            'brand_id'    => 6,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Coriander Seeds/Kottambari Beeja',
            'excerpt'     => 'Royal Coriander Seeds/Kottambari Beeja, 200 g',
            'description' => 'Coriander or Dhaniya powder is a must-have spices ingredient in all Indian Households. Ranging from the North to the South of India, Dhaniya sees itself as part of all kinds of Indian cuisines, whether it is a simple daily meal or an exotic one. Having it in a powder form is a cooks delight as it is made from the finest coriander seeds. Our experts select the best to ensure you get coriander powder that is perfectly balanced in aroma and flavour. To source the coriander we go directly to the farmers.',
            'price'       => 2.90,
            'brand_id'    => 7,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Black Pepper',
            'excerpt'     => 'Popular Black Pepper/Kari Menasu, 200 g Pouch',
            'description' => 'Black Pepper is also known as a peppercorn, is usually dried and used as a spice and seasoning. It is a healthy food that may have some antimicrobial properties. It is utilized along with other spices too to improve the flavour and taste. It is a rich supply of manganese, potassium, iron, vitamin-C, K, and dietary fiber.',
            'price'       => 12,
            'brand_id'    => 8,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Khus Khus/Gasagase',
            'excerpt'     => 'Royal Khus Khus/Gasagase, 200 g',
            'description' => 'Khus Khus also known as poppy seeds is obtained from the opium plant and has culinary uses. They have a peculiar nutty taste, they are highly recommended when you need to add a nice aroma to any cuisine. They are very tiny seeds, much smaller in size than mustard and are both dull white and black in colour.',
            'price'       => 2,
            'brand_id'    => 9,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

        [
            'name'        => 'Coconut Powder - Dessicated',
            'excerpt'     => 'Royal Coconut Powder - Dessicated, 500 g',
            'description' => 'Desiccated Coconut is a finely Grated, Dried, Unsweetened form of Coconut, obtained by drying shredded or ground kernel. It contains no cholesterol or trans fats while being rich in a number of essential nutrients, including dietary fibre, manganese, copper and selenium. It is used as a substitute for raw grated coconut in confectioneries, desserts like puddings, cookies, cakes, pastries, and other food preparations.',
            'price'       => 11,
            'brand_id'    => 10,
            'category_id' => 11,
            'unit_id'     => 2,
            'store_id'    => 8,
            'user_id'     => 1,
            'created_at'  => now(),
        ],

       ];

       DB::table('products')->insert($products);
    }
}
