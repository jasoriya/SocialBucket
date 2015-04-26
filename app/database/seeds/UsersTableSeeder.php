<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use SocialBucket\Users\User;
class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $index)
        {
            User::create([
                'username' => $faker->word . $index,
                'email' => $faker->email,
                'password' => 'secret'

			]);
		}
    }

}