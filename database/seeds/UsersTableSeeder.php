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
            'name' => "Derrigible",
            'email' => 'sutton.bryand@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => "Fallenmonk",
            'email' => 'fallenchipmunk@gmail.com',
            'password' => bcrypt('secret'),
        ]);        
    }
}
