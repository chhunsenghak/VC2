<?php

namespace Database\Seeders;

use App\Models\Frontuser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrontUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Frontuser::Create([
            'name' => 'channich',
            'email' => 'channich@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'phone' => '012 46 78 901',
        ]);
        Frontuser::Create([
            'name' => 'eii',
            'email' => 'eii@example.com',
            'password' => bcrypt('123'),
            'gender' => 'male',
            'phone' => '012 46 78 901',
        ]);
        Frontuser::Create([
            'name' => 'rady',
            'email' => 'rady@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'phone' => '012 46 78 901',
        ]);
        Frontuser::Create([
            'name' => 'neardy',
            'email' => 'neardy@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'phone' => '012 46 78 901',
        ]);
        Frontuser::Create([
            'name' => 'kunthea',
            'email' => 'kunthea@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'phone' => '012 46 78 901',
        ]);
    }
}
