<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
        $types = ["Hoa", "Liễu", "Hằng", "Kim", "Mai", "Anh", "Hà", "Bình", "Phượng"];
        $types1 = ["Phạm", "Nguyễn", "Lê", "Trịnh", "Trần", "Huỳnh", "Phan", "Tạ", "Đoàn"];
        sort($types);
        for ($i=1; $i <= 100; $i++) {
            array_push($list, [
                'id'                => $i,
                'last_name'         => $faker->randomElement($types1),
                'first_name'        => $faker->randomElement($types),
                'email'             => $faker->email(),
                'company'           => $faker->jobTitle(),
                'phone'             => $faker->PhoneNumber(),
                'adress1'          =>$faker->address(),
                'adress2'          =>$faker->address(),
                'city'              =>$faker->city(),
                'state'             =>$faker->text(50),
                'postal_code'       =>$faker->postcode(),
                'country'           =>$faker->country(),
            ]);
        }
        DB::table('customer')->insert($list);
    }
}
