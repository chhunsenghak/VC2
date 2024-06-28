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
                'name' => 'orange',
                'description' => 'good product for is orange',
                'price' => 100,
                'image' => 'orange.jpg',
                'categorys_id' => 1,
                'shop_id' => 1,
                'stock_id' => 1,
                'discount' => '10%',
            ],
            [
                'name' => 'apple',
                'description' => 'good product for is apple',
                'price' => 100,
                'image' => 'apple.jpg',
                'categorys_id' => 1,
                'shop_id' => 1,
                'stock_id' => 1,
                'discount' => '10%',
            ],
            [
                'name' => 'ត្រីអណ្ដែង',
                'description' => 'ជាត្រីដែលមានរសជាតិឆ្ងាញ់អាចយកទៅស្លរ អាំងជាដើមដែលប្រជាជនភាគច្រើនចូលចិត្ត',
                'price' => 100,
                'image' => 'cherry.jpg',
                'categorys_id' => 1,
                'shop_id' => 1,
                'stock_id' => 1,
                'discount' => '10%',
            ],
            [
                'name' => 'ស្រូវសាលី',
                'description' => 'ជលិតផលដែលបុរសចូលចិត្តខ្លាំងជាងគេ',
                'price' => 100,
                'image' => 'strawberry.jpg',
                'categorys_id' => 1,
                'shop_id' => 1,
                'stock_id' => 2,
                'discount' => '10%',
            ]
        ];
        foreach ($products as $product) {
            Products::create($product);
        }
    }
}
