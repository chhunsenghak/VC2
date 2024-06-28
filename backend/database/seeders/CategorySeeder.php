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
                'id' => 1,
                'name' => 'ផ្លៃឈើ',
                'description' => 'ផ្លៃឈើដែលមានគុណភាពល្អចេញពីកសិផលរបស់កសិករខ្មែរយើងសុទ្ទ១០០ភាគរយ',
            ],
            [
                'id' => 2,
                'name' => 'ស្រូវ',
                'description' => 'ផលិតផលដែលសម្បូរនឹងជាអាហារចម្បងរបស់ប្រជាជនកម្ពុជា',
            ],
            [
                'id' => 3,
                'name' => 'ត្រី',
                'description' => 'ត្រីធម្មជាតិរបស់ប្រជាជននៅតាមជនបទ',
            ],
        ];
        foreach ($categories as $category) {
            Categorys::create($category);
        }
    }
}
