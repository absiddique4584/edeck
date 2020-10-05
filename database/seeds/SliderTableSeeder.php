<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;
class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $index) {
            Slider::create([
                'title'     => "Hello! This is Edeck",
                'sub_title' => "This is the most popular e-commerce website in Bangladesh.",
                'image'     => $this->getRandomImage(),
                'url'       => "https://siddiquebd.com",
                'status'    => $this->getRandomStatus()
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
        $image = array('slider1.jpg', 'slider2.jpg', 'slider3.jpg', 'slider4.jpg');
        return $image[array_rand($image)];
    }
}
