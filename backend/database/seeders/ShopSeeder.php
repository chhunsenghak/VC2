<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shops;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $shops = [
            [
                'id' => 1,
                'shop_owner_id' => 1,
                'phone_number' => '091 87 98 12',
            ],
            [
                'id' => 2,
                'shop_owner_id' => 2,
                'phone_number' => '092 87 98 12',
            ],
            [
                'id' => 3,
                'shop_owner_id' => 3,
                'phone_number' => '093 87 98 12',
            ]
        ];
        foreach ($shops as $shop) {
            Shops::create($shop);
        }
    }
}
