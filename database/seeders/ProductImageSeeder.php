<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $productImage = [
          [
             'image' => 'MilkBread.png',
             'product_id' => 1,
          ],

          [
            'image' => 'MuffinCake.png',
            'product_id' =>2,
         ],

         [
            'image' => 'DallaLollipopConfectionery.png',
            'product_id' =>3,
         ],

         [
            'image' => 'DietWheatRusk.png',
            'product_id' =>4,
         ],

         [
            'image' => 'JeeraToast.png',
            'product_id' =>5,
         ],

         [
            'image' => 'PoojaMultigrainToast.png',
            'product_id' =>6,
         ],

         [
            'image' => 'PremiumSujiToast.png',
            'product_id' =>7,
         ],

         [
            'image'      => 'AlifBakersChocoChipsCookies.png',
            'product_id' =>8,
         ],

         [
            'image'      => 'CocoaButterChocolateChip.png',
            'product_id' =>  9,
         ],

         [
            'image'      => 'CHEESECRACKERS.png',
            'product_id' => 10,
         ],

         [
            'image'      => 'BUTTERPOTATOSTICKS.png',
            'product_id' => 11,
         ],


         [
            'image'      => 'MeltykissTahitiVanilla.png',
            'product_id' => 12,
         ],

         [
            'image'      => 'Pringles Napoli Flavor.png',
            'product_id' => 13,
         ],

         [
            'image'      => 'SLIM UP DIET CHOCOLATE SHAKE.png',
            'product_id' => 14,
         ],


         [
            'image'      => 'JAPAN FLAVORS HI CHEW SOFT CANDY.png',
            'product_id' => 15,
         ],


         [
            'image'      => 'JAGABEE SHOYU BUTTER POTATO STICKS.png',
            'product_id' => 16,
         ],

         [
            'image'      => 'Hi Mountain Seasoning for Bacon.png',
            'product_id' => 17,
         ],

         [
            'image'      => 'KITKATPATISSIER APPLE PIE FLAVO.png',
            'product_id' => 18,
         ],

         [
            'image'      => 'PRETZ SWEET ROAST FLAVOR PRETZEL STICKS.png',
            'product_id' => 19,
         ],

         [
            'image'      => 'CHEEZA CHEESE CRACKERS.png',
            'product_id' => 20,
         ],

         [
            'image'      => 'Utz Potato Stix.png',
            'product_id' => 21,
         ],

         [
            'image'      => 'Vanilla Keto Cake.png',
            'product_id' => 22,
         ],

         [
            'image'      => 'Pringles Paprika.png',
            'product_id' => 23,
         ],

         [
            'image'      => 'DIET CHOCOLATE SHAKE.png',
            'product_id' => 24,
         ],

         [
            'image'      => 'Morinaga Hi-Chew Soft candy.png',
            'product_id' => 25,
         ],

         [
            'image'      => 'Puffworks Baby Organic Peanut Butter Puffs.png',
            'product_id' => 26,
         ],

         [
            'image'      => 'Mills Gourmet Original Bacon Pepper Jelly.png',
            'product_id' => 27,
         ],

         [
            'image'      => 'Kit kat chocolate strawberry.png',
            'product_id' => 28,
         ],

         [
            'image'      => 'Happy Belly Pretzel Sticks.png',
            'product_id' => 29,
         ],

         [
            'image'      => 'Fresh Baby Apple Shimla.png',
            'product_id' => 30,
         ],
         [
            'image'      => 'Fresh Pomegranate.png',
            'product_id' => 31,
         ],

         [
            'image'      => 'Kiwi - Green.png',
            'product_id' => 32,
         ],

         [
            'image'      => 'Dates - Kimia, with Seed.png',
            'product_id' => 33,
         ],

         [
            'image'      => 'Fresho Sapota - Organically Grown.png',
            'product_id' => 34,
         ],

         [
            'image'      => 'Fresho Dragon Fruit.png',
            'product_id' => 35,
         ],

         [
            'image'      => 'Fresho Muskmelon - Netted Small.png',
            'product_id' => 36,
         ],

         [
            'image'      => 'Fresho Avocado.png',
            'product_id' => 37,
         ],

         [
            'image'      => 'Fresho Strawberry.png',
            'product_id' => 38,
         ],

         [
            'image'      => 'Fresho Blueberry.png',
            'product_id' => 39,
         ],

         [
            'image'      => 'Fresho Tomato - Local.png',
            'product_id' => 40,
         ],

         [
            'image'      => 'Fresho Carrot - Orange.png',
            'product_id' => 41,
         ],

         [
            'image'      => 'Fresho Cucumber.png',
            'product_id' => 42,
         ],


         [
            'image'      => 'Fresho Chow Chow.png',
            'product_id' => 43,
         ],

         [
            'image'      => 'Fresho Curry Leaves.png',
            'product_id' => 44,
         ],

         [
            'image'      => 'Fresho Broccoli.png',
            'product_id' => 45,
         ],
         [
            'image'      => 'Fresho Capsicum - Green.png',
            'product_id' => 46,
         ],
         [
            'image'      => 'Fresho Beans - Haricot.png',
            'product_id' => 47,
         ],
         [
            'image'      => 'Lettuce - Iceberg.png',
            'product_id' => 48,
         ],
         [
            'image'      => 'Fresho Dill Leaves.png',
            'product_id' => 49,
         ],
         [
            'image'      => 'Chilli Chicken Pieces - Boneless.png',
            'product_id' => 50,
         ],
         [
            'image'      => 'Chicken Mince.png',
            'product_id' => 51,
         ],
         [
            'image'      => 'Chicken Leg.png',
            'product_id' => 52,
         ],
         [
            'image'      => 'Chicken Hariyali Lollipop.png',
            'product_id' =>53,
         ],
         [
            'image'      => 'BBQPepperExoticChickenWings.png',
            'product_id' => 54,
         ],
         [
            'image'      => 'Chicken Biryani Cut 1kg.png',
            'product_id' => 55,
         ],
         [
            'image'      => 'Mutton Lamb.png',
            'product_id' =>56 ,
         ],
         [
            'image'      => 'Tandori Chicken Platter.png',
            'product_id' => 57,
         ],
         [
            'image'      => 'Fresho Tandoori Chicken Drumstick.png',
            'product_id' =>58 ,
         ],
         [
            'image'      => 'Signature Pork - Streaky Bacon.png',
            'product_id' =>59 ,
         ],
         [
            'image'      => 'White Prawns.png',
            'product_id' => 60,
         ],
         [
            'image'      => 'Yellow Fin Tuna.png',
            'product_id' => 61,
         ],
         [
            'image'      => 'Fresho Mackerel Fish - Large, Whole Cleaned.png',
            'product_id' => 62,
         ],
         [
            'image'      => 'Seer Fish.png',
            'product_id' => 63,
         ],
         [
            'image'      => 'BigSamsFrozenSalmon.png',
            'product_id' => 64,
         ],
         [
            'image'      => 'Golden Prize Canned Sardine in Natural Oil.png',
            'product_id' => 65,
         ],
         [
            'image'      => 'BlackPomfret.png',
            'product_id' => 66,
         ],
         [
            'image'      => 'YellofinTunaSteaks.png',
            'product_id' => 67,
         ],
         [
            'image'      => 'Pink Perch Fish.png',
            'product_id' => 68,
         ],
         [
            'image'      => 'Fresh Sardine Fish.png',
            'product_id' => 69,
         ],
         [
            'image'      => 'Squid - Medium.png',
            'product_id' => 70,
         ],
         [
            'image'      => 'BBRoyalCardamomGreen.png',
            'product_id' => 71,
         ],
         [
            'image'      => 'RoyalOrganicBayLeafLavangada.png',
            'product_id' => 72,
         ],
         [
            'image'      => 'CuminJeeraJeerige.png',
            'product_id' => 73,
         ],
         [
            'image'      => 'MustardSasiveRai.png',
            'product_id' => 74,
         ],
         [
            'image'      => 'ChilliGunturwithStem.png',
            'product_id' => 75,
         ],

         [
            'image'      => 'FenugreekMethiMenthya.png',
            'product_id' => 76,
         ],
         [
            'image'      => 'CorianderSeedsKottambariBeeja.png',
            'product_id' => 77,
         ],
         [
            'image'      => 'BlackPepper.png',
            'product_id' => 78,
         ],
         [
            'image'      => 'KhusKhusGasagase.png',
            'product_id' => 79,
         ],
         [
            'image'      => 'CoconutPowderDessicated.png',
            'product_id' => 80,
         ],

        ];


        // ProductImage::create($productImage);
        DB::table('product_images')->insert($productImage);

    }
}
