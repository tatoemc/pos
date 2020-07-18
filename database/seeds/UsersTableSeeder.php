<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = \App\User::create([
        'first_name' => 'super',
        'last_name' => 'admin',
        'email' => 'mostafa@gmail.com',
        'password' => bcrypt('newday77'),
        'user_type' => 'admin',
    ]);
        $user->attachRole('superadmin');
    }
}
