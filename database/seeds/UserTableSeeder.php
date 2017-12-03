<?php

use Illuminate\Database\Seeder;

use App\User;

use Carbon\Carbon;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(0,10) as $index) {
            User::create([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => $faker->safeEmail,
            'phone' => $faker->PhoneNumber,
            'password' => 'adminadmin',
            'role_id' => 2,
            'profile_id' => 1,
            'gender_id' => 1,
            'married_status_id' => 1,
            'active' => true,
            ]);
        }

        $this->command->info('User Created !');

    }
}
