<?php

use Illuminate\Database\Seeder;
use App\Models\Orderinfo;
class OrderinfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,20)as $index){
            OrderInfo::create([
                'order_id'=>rand(1,20),
                'product_id'=>rand(1,20),
                'product_name'=>$faker->name,
                'product_price'=>rand(100,200),
                'product_qty'=>rand(1,3),

            ]);
        }
    }
}
