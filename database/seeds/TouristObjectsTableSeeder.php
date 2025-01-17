<?php

use Illuminate\Database\Seeder;

class TouristObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');
        for ($i=1; $i < 10; $i++) { 

            DB::table('tourist_objects')->insert([

            'name' => $faker->unique()->word,
            'description' => $faker->text(1000),
            'user_id' => $faker->numberBetween(1,9),
            'city_id' => $faker->numberBetween(1,9),

            ]);
        }
    }
}
