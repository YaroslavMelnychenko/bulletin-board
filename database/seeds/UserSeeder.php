<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');

        $userCounter = 0;

        do {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $password = Hash::make('password');

            do {
                $email = $faker->email;
            } while(User::checkEmail($email));

            $user = new User;
            $user->first_name = $firstName;
            $user->last_name = $lastName;
            $user->email = $email;
            $user->password = $password;
            $user->save();

            $userCounter++;
        } while($userCounter < env('SEED_USERS'));
    }
}
