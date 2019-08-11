<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker\Factory::create('vi_VN'); //location ISO
        $list = [];

        $listCategories = DB::table('categories')->pluck('id'); //SELECT id From categories
        $listSuppliers = DB::table('suppliers')->pluck('id'); //SELECT id From suppliers
        for ($i=1; $i <= 100; $i++) {
            array_push($list, [
                'id'                => $i,
                'product_code'      => $faker->numerify('product_######'),
                'product_name'      => $faker->text(50),
                'image'             => $faker->imageUrl(600, 600),
                'description'       => $faker->text(200),
                'standar_cost'     => $faker->randomFloat(50000, 50000, 5000000000),
                'list_price'        => $faker->randomFloat(50000, 50000, 5000000000),
                'quantity_per_unit' => $faker->numberBetween(1, 100),
                'discontinue'      => $faker->numberBetween(1, 0),
                'discount'          => $faker->numberBetween(0, 100),
                //khoas ngoai
                'category_id'       => $faker->randomElement($listCategories),
                'suppliers_id'       => $faker->randomElement($listSuppliers)
            ]);
        }
        DB::table('product')->insert($list);
    }
}
