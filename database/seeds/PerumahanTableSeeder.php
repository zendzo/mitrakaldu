<?php

use Illuminate\Database\Seeder;
use App\Perumahan;

class PerumahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Perumahan::create([
    		'nama' => 'Bintan Lastari',
    		'alamat'	=> 'Jl. Nusantara KM. 15 Bintan Timur, Kec. Bintan Timur Kab. Bintan, Prov.Kepri, 29121'
    	]);

    	$this->command->info('Perumahan Data Created !');
    }
}
