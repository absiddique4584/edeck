<?php

use Illuminate\Database\Seeder;
use App\Models\Payment;
class PaymentTableSeeder extends Seeder
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
            Payment::create([
                'order_id'=>$faker->unique()->numberBetween(1,20),
                'type'=>'Cash',
                'status'=>$this->getRandomStatus(),

            ]);
        }
    }


    public function getRandomStatus()
    {
        # Generate random status
        $statuses = array('success', 'pending');
        return $statuses[array_rand($statuses)];
    }
}
