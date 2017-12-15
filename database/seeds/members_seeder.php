<?php

use Illuminate\Database\Seeder;

class members_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create('lt_LT');

          $data = [];
            for ($i = 0; $i < 10; $i++){
              $data[] = [
                'card_id' => $faker->numberBetween(100000000, 999999999),
                'name' => $faker->name(),
                'start_date' => $faker->dateTimeBetween($startDate = '- 6 month',
                                                        $interval = 'now + 2 week',
                                                        $timeZone = null),
                // 'start_date' => $faker->date($format = 'Y-m-d', $max = 'now + 3 months'),
                'expiry_date' => '2018-01-15',
              ];
            }
            DB::table('members')->insert($data);
    }
}
