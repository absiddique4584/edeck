<?php

use Illuminate\Database\Seeder;
use App\Models\AfterSlider;
class AfterSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,2)as $index){
            AfterSlider::create([
                'money_back' => rand(20, 30),
                'free_shipping' =>rand(60, 100),
                'first_time'=>rand(40, 50),
                'status' =>$this->getRandomStatus(),
            ]);
        }
    }

    /**
     * @return mixed
     */
    public function getRandomStatus()
    {
        # Generate random status
        $statuses = array('active', 'inactive');
        return $statuses[array_rand($statuses)];
    }

}
