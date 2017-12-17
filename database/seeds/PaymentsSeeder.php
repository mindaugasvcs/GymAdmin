<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        foreach (range(1,50) as $index) {
            $membership = \App\Membership::inRandomOrder()->first();

            DB::table('payments')->insert([
                'member_id' => \App\Member::inRandomOrder()->first()->id,
                'user_id' => \App\User::inRandomOrder()->first()->id,
                'membership_id' => $membership->id,
                'amount' => $membership->amount,
                'active_since' => $faker->dateTimeBetween('-40 days', '+20 days')
            ]);
        }
    }
}
