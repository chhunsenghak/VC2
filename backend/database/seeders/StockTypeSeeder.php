<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StockType;

class StockTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stockType = [
            [
                'id' => 1,
                'name' => 'Kg',
                'limit_quantity' => 100,
            ],
            [
                'id' => 2,
                'name' => 'Tons',
                'limit_quantity' => 100,
            ],
            [
                'id' => 3,
                'name' => 'Liters',
                'limntity' => 100,
            ],
            [
                'id' => 4,
                'name' => 'Plon',
                'limntity' => 10,
            ]
        ];
        foreach ($stockType as $key => $data) {
            StockType::create($data);
        }
    }
}
