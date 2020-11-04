<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            $userIDs = DB::table('users')->pluck("id"); //foreignKey
	        DB::table('posts')->insert([
	            'title' => $faker->jobTitle,
	            'description' => $faker->text($maxNbChars = 100),
                'status' => $faker->numberBetween(0,1),
                'create_user_id' => $faker->randomElement($userIDs),
                'updated_user_id' => $faker->randomElement($userIDs),
                'deleted_user_id' => $faker->numberBetween(0,3),
                'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
                'deleted_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
	        ]);
	    }
    }
}
