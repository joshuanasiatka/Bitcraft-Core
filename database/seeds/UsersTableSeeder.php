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
        DB::table('users')->insert([
            'name' => 'BCC Admin',
            'email' => 'admin@alluvion.io',
            'password' => bcrypt('password'),
            'isAdmin' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'BCC User',
            'email' => 'user@alluvion.io',
            'password' => bcrypt('password'),
            'isAdmin' => '0'
        ]);
    }
}
