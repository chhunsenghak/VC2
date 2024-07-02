<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Locations;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Locations::create([
            'province_id' => 1,
            'district_id' => 1,
            'commune_id' => 1,
            'village_id' => 1
        ]);
        Locations::create([
            'province_id' => 1,
            'district_id' => 1,
            'commune_id' => 1,
            'village_id' => 2
        ]);
    }
}
