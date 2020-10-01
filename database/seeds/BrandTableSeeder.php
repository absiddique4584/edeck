<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ["Flamingo", "Apple", "Lenovo", "KEMEI", "Kiam", "Motorex", "Motul", "Samsung", "xiaomi", "Yamaha","Oppo","Sky View"];

        foreach ($brands as $brand) {
            Brand::create([
                'brand_name' => $brand,
                'brand_slug' => slugify($brand),
                'top_brand'  => 'active',
                'status'     => 'active'
            ]);
        }
    }
}
