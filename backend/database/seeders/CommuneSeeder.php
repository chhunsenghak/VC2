<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communes = [
            ['id' => 1, 'district_id' => 1, 'name' => 'Tonle Basak'],
            ['id' => 2, 'district_id' => 1, 'name' => 'Boeng Trabek'],
            ['id' => 3, 'district_id' => 1, 'name' => 'Phsar Doeum Thkov'],
            ['id' => 4, 'district_id' => 1, 'name' => 'Toul Tum Poung 1'],
            ['id' => 5, 'district_id' => 1, 'name' => 'Toul Tum Poung 2'],
            ['id' => 6, 'district_id' => 2, 'name' => 'Sraas Chak'],
            ['id' => 7, 'district_id' => 2, 'name' => 'Wat Phnom'],
            ['id' => 8, 'district_id' => 2, 'name' => 'Phsar Chas'],
            ['id' => 9, 'district_id' => 2, 'name' => 'Phsar Kandal 1'],
            ['id' => 10, 'district_id' => 2, 'name' => 'Phsar Kandal 2'],
            ['id' => 11, 'district_id' => 2, 'name' => 'Chey Chumneas'],
            ['id' => 12, 'district_id' => 2, 'name' => 'Chak Tomuk'],
            ['id' => 13, 'district_id' => 2, 'name' => 'Phsar Thmei 1'],
            ['id' => 14, 'district_id' => 2, 'name' => 'Phsar Thmei 2'],
            ['id' => 15, 'district_id' => 2, 'name' => 'Phsar Thmei 3'],
            ['id' => 16, 'district_id' => 2, 'name' => 'Boeng Raing'],
            ['id' => 17, 'district_id' => 3, 'name' => 'Monourom'],
            ['id' => 18, 'district_id' => 3, 'name' => 'Mittapheap'],
            ['id' => 19, 'district_id' => 3, 'name' => 'Veal Vong'],
            ['id' => 20, 'district_id' => 3, 'name' => 'Ou Russei Ti Mouy'],
            ['id' => 21, 'district_id' => 3, 'name' => 'Ou Russei Ti Pir'],
            ['id' => 22, 'district_id' => 3, 'name' => 'Ou Russei Ti Bei'],
            ['id' => 23, 'district_id' => 3, 'name' => 'Ou Russei Ti Buon'],
            ['id' => 24, 'district_id' => 4, 'name' => 'Phsar Depou Ti Muoy'],
            ['id' => 25, 'district_id' => 4, 'name' => 'Phsar Depou Ti Pir'],
            ['id' => 26, 'district_id' => 4, 'name' => 'Phsar Depou Ti Bei'],
            ['id' => 27, 'district_id' => 4, 'name' => 'Tuek Lak Ti Muoy'],
            ['id' => 28, 'district_id' => 4, 'name' => 'Tuek Lak Ti Pir'],
            ['id' => 29, 'district_id' => 4, 'name' => 'Tuek Lak Ti Bei'],
            ['id' => 30, 'district_id' => 4, 'name' => 'Boeng Kak Ti Muoy'],
            ['id' => 31, 'district_id' => 4, 'name' => 'Boeng Kak Ti Pir'],
            ['id' => 32, 'district_id' => 4, 'name' => 'Phsar Daeum Kor'],
            ['id' => 33, 'district_id' => 4, 'name' => 'Boeng Salang'],
            ['id' => 34, 'district_id' => 5, 'name' => 'Dangkao'],
            ['id' => 35, 'district_id' => 5, 'name' => 'Pong Tuek'],
            ['id' => 36, 'district_id' => 5, 'name' => 'Prey Veaeng'],
            ['id' => 37, 'district_id' => 5, 'name' => 'Prey Sa'],
            ['id' => 38, 'district_id' => 5, 'name' => 'Krang Pongro'],
            ['id' => 39, 'district_id' => 5, 'name' => 'Prateah Lang'],
            ['id' => 40, 'district_id' => 5, 'name' => 'Sak Sampov'],
            ['id' => 41, 'district_id' => 5, 'name' => 'Cheung Aek'],
            ['id' => 42, 'district_id' => 5, 'name' => 'Kong Noy'],
            ['id' => 43, 'district_id' => 5, 'name' => 'Preaek Kampues'],
            ['id' => 44, 'district_id' => 5, 'name' => 'Roluos'],
            ['id' => 45, 'district_id' => 5, 'name' => 'Spean Thma'],
            ['id' => 46, 'district_id' => 5, 'name' => 'Tien'],
            ['id' => 47, 'district_id' => 6, 'name' => 'Stueng Mean Chey'],
            ['id' => 48, 'district_id' => 6, 'name' => 'Boeng Tumpu'],
            ['id' => 49, 'district_id' => 6, 'name' => 'Chak Angrea Leu'],
            ['id' => 50, 'district_id' => 6, 'name' => 'Chak Angrea Kraom'],
            ['id' => 51, 'district_id' => 7, 'name' => 'Tuol Sangke'],
            ['id' => 52, 'district_id' => 7, 'name' => 'Svay Pak'],
            ['id' => 53, 'district_id' => 7, 'name' => 'Kimlomaetr Lekh Prammuoy'],
            ['id' => 54, 'district_id' => 7, 'name' => 'Ruessei Kaev'],
            ['id' => 55, 'district_id' => 7, 'name' => 'Chrang Chamreh Ti Muoy'],
            ['id' => 56, 'district_id' => 7, 'name' => 'Chrang Chamreh Ti Pir'],
            ['id' => 57, 'district_id' => 8, 'name' => 'Phnom Penh Thmei'],
            ['id' => 58, 'district_id' => 8, 'name' => 'Tuek Thla'],
            ['id' => 59, 'district_id' => 8, 'name' => 'Khmuonh'],
            ['id' => 60, 'district_id' => 8, 'name' => 'Krang Thnong'],
            ['id' => 61, 'district_id' => 9, 'name' => 'Trapeang Krasang'],
            ['id' => 62, 'district_id' => 9, 'name' => 'Phleung Chheh Roteh'],
            ['id' => 63, 'district_id' => 9, 'name' => 'Choam Chau'],
            ['id' => 64, 'district_id' => 9, 'name' => 'Kakab'],
            ['id' => 65, 'district_id' => 9, 'name' => 'Samraong Kraom'],
            ['id' => 66, 'district_id' => 9, 'name' => 'Boeng Thum'],
            ['id' => 67, 'district_id' => 9, 'name' => 'Kamboul'],
            ['id' => 68, 'district_id' => 9, 'name' => 'Kantaok'],
            ['id' => 69, 'district_id' => 9, 'name' => 'Ovlaok'],
            ['id' => 70, 'district_id' => 9, 'name' => 'Snaor'],
            ['id' => 71, 'district_id' => 10, 'name' => 'Chrouy Changvar'],
            ['id' => 72, 'district_id' => 10, 'name' => 'Praek Lieb'],
            ['id' => 73, 'district_id' => 10, 'name' => 'Kaoh Dach'],
            ['id' => 74, 'district_id' => 10, 'name' => 'Bak Kaeng'],
            ['id' => 75, 'district_id' => 11, 'name' => 'Preaek Phnov'],
            ['id' => 76, 'district_id' => 11, 'name' => 'Ponhea Pon'],
            ['id' => 77, 'district_id' => 11, 'name' => 'Samraong'],
            ['id' => 78, 'district_id' => 11, 'name' => 'Kouk Roka'],
            ['id' => 79, 'district_id' => 11, 'name' => 'Ponsang'],
            ['id' => 80, 'district_id' => 12, 'name' => 'Chhbar Ampov Ti Muoy'],
            ['id' => 81, 'district_id' => 12, 'name' => 'Chbar Ampov Ti Pir'],
            ['id' => 82, 'district_id' => 12, 'name' => 'Nirouth'],
            ['id' => 83, 'district_id' => 12, 'name' => 'Preaek Pra'],
            ['id' => 84, 'district_id' => 12, 'name' => 'Veal Sbov'],
            ['id' => 85, 'district_id' => 12, 'name' => 'Preaek Aeng'],
            ['id' => 86, 'district_id' => 12, 'name' => 'Kbal Kaoh'],
            ['id' => 87, 'district_id' => 12, 'name' => 'Preaek Thmei'],
        ];
        foreach ($communes as $commune) {
            Commune::create($commune);
        }
    }
}
