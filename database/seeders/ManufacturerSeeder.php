<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;

class ManufacturerSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Manufacturer::insert([
            ['name' => 'Производитель 1'],
            ['name' => 'Производитель 2'],
            ['name' => 'Производитель 3'],
            ['name' => 'Производитель 4'],
            ['name' => 'Производитель 5']
        ]);
    }

}
