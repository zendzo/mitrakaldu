<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

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

        foreach (range(1,2) as $index) {
            Angsuran::create([
				'user_id'	=>	2,
                'rumah_id'  =>  2,
				'kode'	=>	strtoupper(str_random('6')),
				'jumlah'	=>	1250000,
				'completed'	=>	false,
				'tanggal_bayar'	=>	Date('d-m-Y'),
                'tanggal_tempo' =>  Carbon::now()->addMonths(1),
            ]);
        }

        $this->command->info('Angsuran Created !');
    }
}
