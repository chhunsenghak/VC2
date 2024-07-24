<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorys;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'ផ្លៃឈើ',
                'image' => 'fruit.jpg',
                'description' => 'ផ្លៃឈើដែលមានគុណភាពល្អចេញពីកសិផលរបស់កសិករខ្មែរយើងសុទ្ទ១០០ភាគរយ',
            ],
            [
                'name' => 'ស្រូវ',
                'image' => 'rice sticky.jpg',
                'description' => 'ផលិតផលដែលសម្បូរនឹងជាអាហារចម្បងរបស់ប្រជាជនកម្ពុជា',
            ],
            [
                'name' => 'ត្រី',
                'image' => 'fish.jfif',
                'description' => 'ត្រីធម្មជាតិរបស់ប្រជាជននៅតាមជនបទ',
            ],
            [
                'name' => 'គ្រាប់ធុញ្ញជាតិ',
                'image' => 'seed.jpg',
                'description' => 'ពូជល្អ',
            ],
            [
                'name' => 'អង្ករ',
                'image' => 'rice.webp',
                'description' => 'ពូជល្អ',
            ],
            [
                'name' => 'ទឹកផ្លែឈើ',
                'image' => 'fruit juice.jpg',
                'description' => 'ឆ្ងាញ់ ថ្មីៗ',
            ],
            [
                'name' => 'បន្លែ',
                'image' => 'vegetable.jpg',
                'description' => 'ថ្មីៗ​ ធម្មជាតិពិតៗ',
            ],
            [
                'name' => 'គ្រឿងទេស',
                'image' => 'ingredient.jpg',
                'description' => 'ថ្មីៗ​ មិនមានជាតិគីមី',
            ],
        ];
        foreach ($categories as $category) {
            Categorys::create($category);
        }
    }
}
