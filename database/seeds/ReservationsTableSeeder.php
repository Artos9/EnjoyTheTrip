<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create('pl_PL');
        for ($i=1; $i < 50; $i++) {

            DB::table('reservations')->insert([

            'user_id' => $faker->numberBetween(1,9),
            'city_id' => $faker->numberBetween(1,9),
            'room_id' => $faker->numberBetween(1,29),
            'status' => $faker->boolean(50),
            'day_in' => $faker->dateTimebetween('-10 days', 'now'),
            'day_out' => $faker->dateTimebetween('now', '+10 days'),
            ]);
        }
    }
}
