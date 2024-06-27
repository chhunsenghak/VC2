<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villages = [
            ['id' => 1, 'commune_id' => 1, 'name' => 'Phum 1'],
            ['id' => 2, 'commune_id' => 1, 'name' => 'Phum 2'],
            ['id' => 3, 'commune_id' => 1, 'name' => 'Phum 3'],
            ['id' => 4, 'commune_id' => 1, 'name' => 'Phum 4'],
            ['id' => 5,'commune_id' => 1, 'name' => 'Phum 5'],
            ['id' => 6, 'commune_id' => 1, 'name' => 'Phum 6'],
            ['id' => 7, 'commune_id' => 1, 'name' => 'Phum 7'],
            ['id' => 8, 'commune_id' => 1, 'name' => 'Phum 8'],
            ['id' => 9, 'commune_id' => 1, 'name' => 'Phum 9'],
            ['id' => 10, 'commune_id' => 1, 'name' => 'Phum 10'],
            ['id' => 11, 'commune_id' => 1, 'name' => 'Phum 11'],
            ['id' => 12, 'commune_id' => 1, 'name' => 'Phum 12'],
            ['id' => 13, 'commune_id' => 1, 'name' => 'Phum 13'],
            ['id' => 14, 'commune_id' => 1, 'name' => 'Phum 14'],
            ['id' => 15, 'commune_id' => 1, 'name' => 'Phum 15'],
            ['id' => 16, 'commune_id' => 1, 'name' => 'Phum 16']
        ];
        foreach ($villages as $village){
            Village::create($village);
        }
    }
}
