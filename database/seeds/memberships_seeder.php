<?php

use Illuminate\Database\Seeder;

class memberships_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [];
      $data[] = [
                  'memberships' => 'Neribotas (1 mėn.)',
                  'valid_days' => 30,
                  'price' => 40,
                ];
      $data[] = [
                  'memberships' => 'Neribotas (3 mėn.)',
                  'valid_days' => 90,
                  'price' => 108,
                ];
      $data[] = [
                  'memberships' => 'Neribotas (6 mėn.)',
                  'valid_days' => 180,
                  'price' => 192,
                ];
      $data[] = [
                  'memberships' => 'Neribotas (12 mėn.)',
                  'valid_days' => 360,
                  'price' => 336,
                ];

    DB::table('memberships')->insert($data);
    }
}
