<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stocks = [
            [
                'id' => 1,
                'quantity' => 500,
                'stock_type_id' => 1
            ],
            [
                'id' => 2,
                'quantity' => 300,
                'stock_type_id' => 1
            ],
            [
                'id' => 3,
                'quantity' => 100,
                'stock_type_id' => 2
            ]
        ];
        foreach ($stocks as $stock) {
            \App\Models\Stock::create($stock);
        }
    }
}
