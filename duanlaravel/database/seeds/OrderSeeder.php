<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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

        $listEmployee = DB::table('employees')->pluck('id'); //SELECT id From categories
        $listCustomer = DB::table('customer')->pluck('id'); //SELECT id From suppliers
        for ($i=1; $i <= 100; $i++) {
            array_push($list, [
                'id'                => $i,
                'order_day'      => $faker->date($format = 'Y-m-d', $max = 'now'),
                'shipped_day'      => $faker->date($format = 'Y-m-d', $max = 'now-2'),
                'ship_name'             => $faker->name(),
                'ship_adress1'       => $faker->address(),
                'ship_adress2'     => $faker->address(),
                'ship_city'        => $faker->city(),
                'ship_state'            => $faker->numberBetween(0, 2), //0 chưa nhận 1 đã nhận 2 đã giao
                'ship_postal_code'      => $faker->postcode(),
                'ship_country'          => $faker->country(0, 100),
                'shipping_fee'          => $faker->randomFloat(50000, 50000, 5000000000),
                'payment_type'          => $faker->text(50),
                'paid_date'          => $faker->date($format = 'Y-m-d', $max = 'now-5'),
                'order_status'          => $faker->text(50),
                //khoas ngoai
                'employee_id'       => $faker->randomElement($listEmployee),
                'customer_id'       => $faker->randomElement($listCustomer)
            ]);
        }
        DB::table('orders')->insert($list);
    }
}
