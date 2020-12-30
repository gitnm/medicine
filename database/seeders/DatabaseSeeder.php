<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->clearData();
        $this->call(SubstanceSeeder::class);
        $this->call(ManufacturerSeeder::class);
        $this->call(MedicineSeeder::class);
    }
    
    private function clearData() {
        DB::table('medicines')->delete();
        DB::table('substances')->delete();
        DB::table('manufacturers')->delete();
    }
}
