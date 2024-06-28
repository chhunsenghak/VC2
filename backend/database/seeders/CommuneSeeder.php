<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communes = [
            ['id' => 1, 'district_id' => 1, 'name' => 'Tonle Basak'],
            ['id' => 2, 'district_id' => 1, 'name' => 'Boeng Trabek'],
            ['id' => 3, 'district_id' => 1, 'name' => 'Phsar Doeum Thkov'],
            ['id' => 4, 'district_id' => 1, 'name' => 'Toul Tum Poung 1'],
            ['id' => 5, 'district_id' => 1, 'name' => 'Toul Tum Poung 2'],
            ['id' => 6, 'district_id' => 2, 'name' => 'Sraas Chak'],
            ['id' => 7, 'district_id' => 2, 'name' => 'Wat Phnom'],
            ['id' => 8, 'district_id' => 2, 'name' => 'Phsar Chas'],
            ['id' => 9, 'district_id' => 2, 'name' => 'Phsar Kandal 1'],
            ['id' => 10, 'district_id' => 2, 'name' => 'Phsar Kandal 2'],
            ['id' => 11, 'district_id' => 2, 'name' => 'Chey Chumneas'],
            ['id' => 12, 'district_id' => 2, 'name' => 'Chak Tomuk'],
            ['id' => 13, 'district_id' => 2, 'name' => 'Phsar Thmei 1'],
            ['id' => 14, 'district_id' => 2, 'name' => 'Phsar Thmei 2'],
            ['id' => 15, 'district_id' => 2, 'name' => 'Phsar Thmei 3'],
            ['id' => 16, 'district_id' => 2, 'name' => 'Boeng Raing'],
            ['id' => 17, 'district_id' => 3, 'name' => 'Monorom'],
            ['id' => 18, 'district_id' => 3, 'name' => 'Mittapheap'],
            ['id' => 19, 'district_id' => 3, 'name' => 'Veal Vong'],
        ];
        foreach ($communes as $commune) {
            Commune::create($commune);
        }
    }
}
