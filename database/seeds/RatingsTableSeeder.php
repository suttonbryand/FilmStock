<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert([
            'comment' => "I can only assume it will be really good.  I mean it has to be right?  It's Christopher Nolan",
            'score' => 8,
            'user_id' => 1,
            'movie_id' => 1
        ]);
    }
}
