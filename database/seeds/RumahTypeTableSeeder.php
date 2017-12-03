<?php

use Illuminate\Database\Seeder;
use App\RumahType;

class RumahTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$rumah = ['Type 36','Type 45'];

    	foreach ($rumah as $item) {
    		RumahType::create([
    			'type'	=> $item,
        	]);
    	}

        $this->command->info('Type Rumah Created !');
    }
}
