<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
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
        $types = ["Đăng", "Hiếu", "Khang", "Giang", "Đạt", "Anh", "Lộc", "Tùng", "Phú"];
        $types1 = ["Phạm", "Nguyễn", "Lê", "Trịnh", "Trần", "Huỳnh", "Phan", "Tạ", "Đoàn"];
        sort($types);
        for ($i=1; $i <= 100; $i++) {
            array_push($list, [
                'id'                 =>$i,
                'username'           =>$faker->userName(),
                'last_name'          =>$faker->randomElement($types1),
                'first_name'         =>$faker->randomElement($types),
                'email'              =>$faker->email(),
                'avatar'             =>$faker->imageUrl(600, 600),
                'password'           =>$faker->password(),
                'job_title'          =>$faker->jobTitle(),
                'department'         =>$faker->text(20),
                'manager_id'         =>$faker->numerify('#########'),
                'phone'              =>$faker->PhoneNumber(),
                'adress1'           =>$faker->address(),
                'adress2'           =>$faker->address(),
                'city'               =>$faker->city(),
                'state'              =>$faker->text(50),
                'postal_code'        =>$faker->postcode(),
                'country'            =>$faker->country(),
                'remember_token'     =>$faker->text(50),
            ]);
        }
        DB::table('employees')->insert($list);
    }
}
