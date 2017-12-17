<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        foreach (range(1,20) as $index) {
            DB::table('members')->insert([
                'unique_id' => $faker->unique()->numberBetween(100000000, 999999999),
                'name' => $faker->name()
            ]);
        }
    }
}
