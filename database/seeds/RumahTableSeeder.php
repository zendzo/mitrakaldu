<?php

use Illuminate\Database\Seeder;
use App\Rumah;

class RumahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++) { 
        	$harga = 125000000;
        	$angsuran = $harga * 0.1 / 10;
        	Rumah::create([
                'rumah_type_id' =>  1,
        		'perumahan_id'	=>	1,
				'block'	=>	'A',
				'no'	=>	$i,
				'subsidi'	=> true,
				'harga'		=>	$harga,
				'booked_by' => null,
				'location'	=> 'images/data/2017-12-04-Administrator System/285ab9448d2751ee57ece7f762c39095.jpg',
        	]);
        }

        $this->command->info('Rumah Items Created !');
    }
}
