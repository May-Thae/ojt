<?php

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
            'profile' => $faker->imageUrl($width = 640, $height = 480),
            'type' => $faker->numberBetween(0,1),
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => $faker->numberBetween(0,3),
            'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
            'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
            'deleted_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
        ]);

    	foreach (range(2,10) as $index) {
            $userIDs = DB::table('users')->pluck("id"); //foreignKey
	        DB::table('users')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
                'password' => bcrypt('secret'),
                'profile' => $faker->imageUrl($width = 640, $height = 480),
                'type' => $faker->numberBetween(0,1),
                'phone' => $faker->tollFreePhoneNumber,
                'address' => $faker->address,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
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
