<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'name' => 'ផ្លែក្រូច',
                'description' => 'ផ្លែក្រូចកំពង់ចាម',
                'price' => 10000,
                'frontuser_id' => 1,
                'image' => '1720927018.jpg',
                'categorys_id' => 1,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ផ្លែប៉ោង',
                'description' => 'ដាំដុះដោយកសិករនៅខេត្តកំពង់ធំ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'apple.jpg',
                'categorys_id' => 1,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ត្រីអណ្ដែង',
                'description' => 'ជាត្រីដែលមានរសជាតិឆ្ងាញ់អាចយកទៅស្លរ អាំងជាដើមដែលប្រជាជនភាគច្រើនចូលចិត្ត',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'fish.jfif',
                'categorys_id' => 1,
                'stock_id' => 1,
                'quantity' => 10,
            ],
            [
                'name' => 'អង្ករដំណើប',
                'description' => 'អង្ករដែលល្អ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => '1720927081.jpg',
                'categorys_id' => 1,
                'stock_id' => 2,
                'quantity' => 10,
            ]
        ];
        foreach ($products as $product) {
            Products::create($product);
        }
    }
}
