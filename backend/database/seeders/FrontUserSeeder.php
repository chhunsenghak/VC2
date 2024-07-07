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
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'nich.jpg',
        ]);
        Frontuser::Create([
            'name' => 'eii',
            'email' => 'eii@example.com',
            'password' => bcrypt('123'),
            'gender' => 'male',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'eii.jpg',
            'bio' => 'I am a web developer with a passion for creating beautiful and functional websites. I have been working in the industry for the past 5 years and have gained a lot of experience in various technologies.',
        ]);
        Frontuser::Create([
            'name' => 'rady',
            'email' => 'rady@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'rady.jpg',
            'bio' => 'I am a web developer with a passion for creating beautiful and functional websites. I have been working in the industry for the past 5 years and have gained a lot of experience in various technologies.',
        ]);
        Frontuser::Create([
            'name' => 'neardy',
            'email' => 'neardy@example.com',
            'password' => bcrypt('123'),
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'neardy.jpg',
            'bio' => 'I am a web developer with a passion for creating beautiful and functional websites. I have been working in the industry for the past 5 years and have gained a lot of experience in various technologies.',
        ]);
        Frontuser::Create([
            'name' => 'kunthea',
            'email' => 'kunthea@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'sokunthea.jpg',
        ]);
        Frontuser::Create([
            'name' => 'Senghak',
            'email' => 'Leak@example.com',
            'password' => bcrypt('123'),
            'gender' => 'Male',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
        ]);
    }
}
