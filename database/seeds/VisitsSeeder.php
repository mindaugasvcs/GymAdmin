<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VisitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        foreach (range(1,100) as $index) {
            $membership = \App\Membership::inRandomOrder()->first();

            DB::table('visits')->insert([
                'member_id' => \App\Member::inRandomOrder()->first()->id,
                'created_at' => $faker->dateTimeBetween('-40 days', '-1 days')
            ]);
        }
    }
}
