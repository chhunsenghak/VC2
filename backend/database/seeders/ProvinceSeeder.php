<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['id' => 1, 'name' => 'Phnom Penh' ],
            ['id' => 2, 'name' => 'Banteay Meanchey' ],
            ['id' => 3, 'name' => 'Battambang' ],
            ['id' => 4, 'name' => 'Kampong Cham' ],
            ['id' => 5, 'name' => 'Kampong Chhnang' ],
            ['id' => 6, 'name' => 'Kampong Speu' ],
            ['id' => 7, 'name' => 'Kampong Thom' ],
            ['id' => 8, 'name' => 'Kampot' ],
            ['id' => 9, 'name' => 'Kandal' ],
            ['id' => 10, 'name' => 'Koh Kong' ],
            ['id' => 11, 'name' => 'Kep' ],
            ['id' => 12, 'name' => 'Mondulkiri' ],
            ['id' => 13, 'name' => 'Oddar Meanchey' ],
            ['id' => 14, 'name' => 'Pailin' ],
            ['id' => 15, 'name' => 'Preah Sihanoukville' ],
            ['id' => 16, 'name' => 'Preah Vihear' ],
            ['id' => 17, 'name' => 'Pursat' ],
            ['id' => 18, 'name' => 'Prey Veng' ],
            ['id' => 19, 'name' => 'Ratanakiri' ],
            ['id' => 20, 'name' => 'Siem Reap' ],
            ['id' => 21, 'name' => 'Stung Treng' ],
            ['id' => 22, 'name' => 'Svay Rieng' ],
            ['id' => 23, 'name' => 'Takeo' ],
            ['id' => 24, 'name' => 'Tbong Khmum' ]
        ];
        foreach ($provinces as $province){
            Province::create($province);
        }
    }
}
