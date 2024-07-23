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
                'name' => 'ផ្លែប៉ោម',
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
                'name' => 'ត្រីក្រាញ់',
                'description' => 'ជាត្រីដែលមានរសជាតិឆ្ងាញ់អាចយកទៅស្លរ អាំងជាដើមដែលប្រជាជនភាគច្រើនចូលចិត្ត',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'fish kranh.jpg',
                'categorys_id' => 3,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'អង្ករដំណើប',
                'description' => 'អង្ករដែលល្អ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => '1720927081.jpg',
                'categorys_id' => 5,
                'stock_id' => 2,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'អង្ករនាងនួន',
                'description' => 'អង្ករដែលល្អ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'rice.webp',
                'categorys_id' => 5,
                'stock_id' => 2,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ស្ពៃក្តោប',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'cabbage.webp',
                'categorys_id' => 7,
                'stock_id' => 2,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ប៊ីចេង',
                'description' => 'ឆ្ងាញ់',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'sesoning.jpeg',
                'categorys_id' => 8,
                'stock_id' => 2,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ទឹកត្នោត',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'palm juice.jpg',
                'categorys_id' => 6,
                'stock_id' => 2,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ស្វាយទំុ',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'mango.jpg',
                'categorys_id' => 1,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ម្នាស់',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'pineapple.jpg',
                'categorys_id' => 1,
                'stock_id' => 2,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'មើមយ៉េន',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'yen.jpg',
                'categorys_id' => 1,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ខ្ទឹមបារាំង',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'onion.jpg',
                'categorys_id' => 7,
                'stock_id' => 2,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ត្រីរៀល',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'ត្រីរៀល.jpg',
                'categorys_id' => 3,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ត្រីផ្ទក់់',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'ត្រីផ្ទក់.jpg',
                'categorys_id' => 3,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ទឹកការ៉ុត',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'ទឹកការ៉ុត.jpg',
                'categorys_id' => 6,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
            [
                'name' => 'ឆៃថាវ',
                'description' => 'ស្រស់ៗ',
                'price' => 100,
                'frontuser_id' => 1,
                'image' => 'ឆៃថាវ.jpg',
                'categorys_id' => 7,
                'stock_id' => 1,
                'quantity' => 10,
                'break_product_at' => now()
            ],
        ];
        foreach ($products as $product) {
            Products::create($product);
        }
    }
}
