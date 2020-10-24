<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
class OrderTableSeeder extends Seeder
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
            Order::create([
                'customer_id'=>rand(1,20),
                'shipping_id'=>rand(1,20),
                'total'=>rand(500,900),
                'status'=>$this->getRandomStatus(),

            ]);
        }
    }


    public function getRandomStatus()
    {
        # Generate random status
        $statuses = array('success', 'pending','return','shipped');
        return $statuses[array_rand($statuses)];
    }
}
