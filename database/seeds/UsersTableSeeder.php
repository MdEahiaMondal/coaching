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
        \App\User::create([
            'name' => 'khan',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'mobile' => '01521414629',
            'password' => bcrypt('01521414629'),
        ]);
    }
}
