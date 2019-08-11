<?php

use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
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
        $types = ["Apple", "SamSung", "Microsoft", "Dell", "Asus", "HP", "Acer", "Mac","Nokia"];
        sort($types);
        //$today = new DateTime('2019-01-01 08:00:00');
        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'id'      => $i,
                'supplier_code'     => 'MH'.$i,
                'supplier_name'     => $types[$i-1],
                'description'  => $faker->text(250), //xin du lieu gia
                'image' => $faker->imageUrl(300, 300) // xindu lieu gia
            ]);
        }
        DB::table('suppliers')->insert($list);
    }
}
