<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerTableSeeder extends Seeder
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
            Customer::create([
                'name'=>$faker->name,
                'email'=>$faker->unique()->email,
                'phone'=>'01738254983',
                'password'=>bcrypt('12345678'),

            ]);
        }
    }
}
