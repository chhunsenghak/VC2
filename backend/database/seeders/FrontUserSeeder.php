<?php

namespace Database\Seeders;

use App\Models\Frontuser;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class FrontUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $user1 = Frontuser::Create([
            'name' => 'Anne Nichz',
            'email' => 'channich@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'nich.jpg',
            'bio' => 'លក់ប្រកបដោយភាពថ្លៃថ្នូរ',
            'linkenin' => 'linkedin.com/in/chan-nich-noeurn-06232a2a3',
            'facebook' => 'https://www.facebook.com/luu.lii.14203?mibextid=LQQJ4d',
            'telegram' => '@annenichz',
            'address' => 'BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh',
        ]);
        $user2 = Frontuser::Create([
            'name' => 'eii',
            'email' => 'eii@example.com',
            'password' => bcrypt('123'),
            'gender' => 'male',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'eii.jpg',
            'bio' => 'លក់ប្រកបដោយភាពថ្លៃថ្នូរ',
            'linkenin' => 'linkedin.com/in/chan-nich-noeurn-06232a2a3',
            'facebook' => 'https://www.facebook.com/luu.lii.14203?mibextid=LQQJ4d',
            'telegram' => '@annenichz',
            'address' => 'BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh',
        ]);
        $user3 = Frontuser::Create([
            'name' => 'rady',
            'email' => 'rady@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'rady.jpg',
            'bio' => 'លក់ប្រកបដោយភាពថ្លៃថ្នូរ',
            'linkenin' => 'linkedin.com/in/chan-nich-noeurn-06232a2a3',
            'facebook' => 'https://www.facebook.com/luu.lii.14203?mibextid=LQQJ4d',
            'telegram' => '@annenichz',
            'address' => 'BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh',
        ]);
        $user4 = Frontuser::Create([
            'name' => 'neardy',
            'email' => 'neardy@example.com',
            'password' => bcrypt('123'),
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'neardy.jpg',
            'bio' => 'លក់ប្រកបដោយភាពថ្លៃថ្នូរ',
            'linkenin' => 'linkedin.com/in/chan-nich-noeurn-06232a2a3',
            'facebook' => 'https://www.facebook.com/luu.lii.14203?mibextid=LQQJ4d',
            'telegram' => '@annenichz',
            'address' => 'BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh',
        ]);
        $user5 = Frontuser::Create([
            'name' => 'kunthea',
            'email' => 'kunthea@example.com',
            'password' => bcrypt('123'),
            'gender' => 'female',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'profile' => 'sokunthea.jpg',
            'bio' => 'លក់ប្រកបដោយភាពថ្លៃថ្នូរ',
            'linkenin' => 'linkedin.com/in/chan-nich-noeurn-06232a2a3',
            'facebook' => 'https://www.facebook.com/luu.lii.14203?mibextid=LQQJ4d',
            'telegram' => '@annenichz',
            'address' => 'BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh',
        ]);
        $user6 = Frontuser::Create([
            'name' => 'Senghak',
            'email' => 'Leak@example.com',
            'password' => bcrypt('123'),
            'gender' => 'Male',
            'check' => 0,
            'shop' => 1,
            'phone' => '012 46 78 901',
            'bio' => 'លក់ប្រកបដោយភាពថ្លៃថ្នូរ',
            'linkenin' => 'linkedin.com/in/chan-nich-noeurn-06232a2a3',
            'facebook' => 'https://www.facebook.com/luu.lii.14203?mibextid=LQQJ4d',
            'telegram' => '@annenichz',
            'address' => 'BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh',
        ]);
        // $user_role = Role::where(['name', 'user']);
        // $seller_role = Role::create(['name', 'seller']);
        // $buyer_role = Role::create(['name' => 'buyer']);

        // $user1->assignRole($seller_role);
        // $user2->assignRole($seller_role);
        // $user3->assignRole($user_role);
        // $user4->assignRole($user_role);
        // $user5->assignRole($buyer_role);
        // $user6->assignRole($buyer_role);
    }
}
