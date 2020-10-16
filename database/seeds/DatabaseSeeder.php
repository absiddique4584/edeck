<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UsersTableSeeder::class,
             BrandTableSeeder::class,
             CategoryTableSeeder::class,
             SubCategoryTableSeeder::class,
             SliderTableSeeder::class,
             ProductTableSeeder::class,
             AfterSliderTableSeeder::class,
             CustomerTableSeeder::class,
             ProductReviewTableSeeder::class,
         ]);
    }
}
