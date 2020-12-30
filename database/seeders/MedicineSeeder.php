<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Substance;
use App\Models\Manufacturer;
use App\Models\Medicine;

class MedicineSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $medicines = [];
        $substanceIds = Substance::all()->pluck('id')->toArray();
        $manufacturerIds = Manufacturer::all()->pluck('id')->toArray();
        for ($i = 0; $i <= 100; $i++) {
            $medicines[] = [
                'name' => 'Лекарственное средство '. $i,
                'substance_id' => $substanceIds[array_rand($substanceIds, 1)],
                'manufacturer_id' => $manufacturerIds[array_rand($manufacturerIds, 1)],
                'price' => (float) rand(1,1000)
            ];
        }
        Medicine::insert($medicines);
    }

}
