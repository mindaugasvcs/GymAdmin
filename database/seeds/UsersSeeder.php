<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Admin';
        $user->email = 'test@email.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
