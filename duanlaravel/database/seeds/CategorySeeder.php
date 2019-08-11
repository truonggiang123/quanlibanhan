<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN'); //location ISO
        $list = [];
        $types = ["Hoa lẻ", "Phụ liệu", "Bó hoa", "Giỏ hoa", "Hoa hộp giấy", "Kệ hoa", "Vòng hoa", "Bình hoa", "Hoa hộp gỗ"];
        sort($types);
        // $today = new DateTime('2019-01-01 08:00:00');
        for ($i = 1; $i <= 100; $i++) {
            array_push($list, [
                'id'      => $i,
                'category_code'     => 'Ma' . $i,
                'category_name'     => $faker->randomElement($types), // tu lay du lieu
                'description'  => $faker->text(250),
                'image' => $faker->imageUrl(300, 300)
            ]);
        }
        DB::table('categories')->insert($list);
    }
}
