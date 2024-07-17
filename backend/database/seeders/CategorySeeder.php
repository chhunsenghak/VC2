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
                'image' => 'licensed-image.jfif',
                'description' => 'ផ្លៃឈើដែលមានគុណភាពល្អចេញពីកសិផលរបស់កសិករខ្មែរយើងសុទ្ទ១០០ភាគរយ',
            ],
            [
                'name' => 'ស្រូវ',
                'image' => 'rices.webp',
                'description' => 'ផលិតផលដែលសម្បូរនឹងជាអាហារចម្បងរបស់ប្រជាជនកម្ពុជា',
            ],
            [
                'name' => 'ត្រី',
                'image' => 'fish.jfif',
                'description' => 'ត្រីធម្មជាតិរបស់ប្រជាជននៅតាមជនបទ',
            ],
        ];
        foreach ($categories as $category) {
            Categorys::create($category);
        }
    }
}
