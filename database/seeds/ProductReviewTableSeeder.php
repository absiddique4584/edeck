<?php

use Illuminate\Database\Seeder;
use App\Models\ProductReview;
class ProductReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,200)as $index){
            ProductReview::create([
                'customer_id'=>rand(1,10),
                'product_id'=>rand(1,20),
                'message'=>$faker->sentence,
                'rating'=>rand(1,5),
                'status'=>$this->getRandomStatus(),

            ]);
        }

    }

    public function getRandomStatus()
    {
        # Generate random status
        $statuses = array('visible', 'hidden');
        return $statuses[array_rand($statuses)];
    }
}
