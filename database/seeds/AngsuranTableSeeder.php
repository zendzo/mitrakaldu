<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Angsuran;

class AngsuranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

        foreach (range(1,10) as $index) {
            Angsuran::create([
				'user_id'	=>	2,
                'rumah_id'  =>  2,
				'kode'	=>	strtoupper(str_random('6')),
				'jumlah'	=>	1250000,
				'completed'	=>	false,
                'tanggal_tempo' =>  $faker->DateTime,
				'tanggal_bayar'	=>	$faker->DateTime,
            ]);
        }

        $this->command->info('Angsuran Created !');
    }
}
