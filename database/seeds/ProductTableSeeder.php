<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 700) as $index) {
            $name = $faker->sentence;
            Product::create([
                'cat_id'              => rand(1, 10),
                'subcat_id'           => rand(1, 106),
                'brand_id'            => rand(1, 10),
                'name'                => $name,
                'slug'                => slugify($name),
                'model'               => $faker->name,
                'buying_price'        => rand(700, 900),
                'selling_price'       => rand(920, 1200),
                'special_price'       => rand(500, 600),
                'special_start'       => date('Y-m-d'),
                'special_end'         => date('Y-m-d', strtotime('+1 month')),
                'quantity'            => rand(10, 20),
                'video_url'           => null,
                'warranty'            => 0,
                'warranty_duration'   => null,
                'warranty_conditions' => null,
                'thumbnail'           => $this->getRandomImage(),
                'gallery'             => null,
                'description'         => $faker->paragraph(),
                'long_description'    => null,
                'status'              => 'active'
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

    /**
     * @return mixed
     */
    public function getRandomImage()
    {
        # Generate random image
        $image = array('p1.jpg', 'p2.jpg', 'p3.jpg', 'p4.jpg', 'p5.jpg', 'p6.jpg', 'p7.jpg', 'p8.jpg', 'p9.jpg', 'p10.jpg', 'p11.jpg', 'p12.jpg', 'p13.jpg', 'p14.jpg', 'p15.jpg');
        return $image[array_rand($image)];
    }
}
