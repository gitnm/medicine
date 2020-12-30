<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Substance;

class SubstanceSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Substance::insert([
            ['name' => 'Действующее вещество 1'],
            ['name' => 'Действующее вещество 2'],
            ['name' => 'Действующее вещество 3']
        ]);
    }
    
}
