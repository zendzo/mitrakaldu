<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(GenderAndMarriedStatusSeeder::class);
        $this->call(DocumentTypeTableSeeder::class);
        $this->call(RumahTableSeeder::class);
        $this->call(RumahTypeTableSeeder::class);
        $this->call(AngsuranTableSeeder::class);
    }
}
