<?php

use Illuminate\Database\Seeder;

use App\User;

use Carbon\Carbon;
use Faker\Factory;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        for ($i=0; $i < 1; $i++) { 
        	$user->first_name = 'Administrator';
	        $user->last_name = 'System';
            $user->email = 'admin@majujaya.com';
	        $user->phone = 'phone';
	        $user->password = 'adminadmin';
	        $user->role_id = 1;
	        $user->save();
        }

        $this->command->info('Administrator User Created !');

    }
}
