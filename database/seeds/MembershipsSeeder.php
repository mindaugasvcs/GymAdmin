<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MembershipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');
        $limit_type = ['days_count', 'visits_count'];

        foreach (range(1,10) as $index) {
            DB::table('memberships')->insert([
                'title' => ucfirst($faker->unique()->word),
                'limit_type' => $limit_type[rand(0, 1)],
                'limit' => rand(10, 90),
                'amount' => $faker->randomFloat(2, 10, 100)
            ]);
        }
    }
}
