<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villages = [
            ['id' => 1, 'commune_id' => 1, 'name' => 'Phum 1'],
            ['id' => 2, 'commune_id' => 1, 'name' => 'Phum 2'],
            ['id' => 3, 'commune_id' => 1, 'name' => 'Phum 3'],
            ['id' => 4, 'commune_id' => 1, 'name' => 'Phum 4'],
            ['id' => 5, 'commune_id' => 1, 'name' => 'Phum 5'],
            ['id' => 6, 'commune_id' => 1, 'name' => 'Phum 6'],
            ['id' => 7, 'commune_id' => 1, 'name' => 'Phum 7'],
            ['id' => 8, 'commune_id' => 1, 'name' => 'Phum 8'],
            ['id' => 9, 'commune_id' => 1, 'name' => 'Phum 9'],
            ['id' => 10, 'commune_id' => 1, 'name' => 'Phum 10'],
            ['id' => 11, 'commune_id' => 1, 'name' => 'Phum 11'],
            ['id' => 12, 'commune_id' => 1, 'name' => 'Phum 12'],
            ['id' => 13, 'commune_id' => 1, 'name' => 'Phum 13'],
            ['id' => 14, 'commune_id' => 1, 'name' => 'Phum 14'],
            ['id' => 15, 'commune_id' => 1, 'name' => 'Phum 15'],
            ['id' => 16, 'commune_id' => 1, 'name' => 'Phum 16'],
            ['id' => 17, 'commune_id' => 2, 'name' => 'Phum 1'],
            ['id' => 18, 'commune_id' => 2, 'name' => 'Phum 2'],
            ['id' => 19, 'commune_id' => 2, 'name' => 'Phum 3'],
            ['id' => 20, 'commune_id' => 2, 'name' => 'Phum 4'],
            ['id' => 21, 'commune_id' => 2, 'name' => 'Phum 5'],
            ['id' => 22, 'commune_id' => 2, 'name' => 'Phum 6'],
            ['id' => 23, 'commune_id' => 2, 'name' => 'Phum 7'],
            ['id' => 24, 'commune_id' => 2, 'name' => 'Phum 8'],
            ['id' => 25, 'commune_id' => 3, 'name' => 'Phum 1'],
            ['id' => 26, 'commune_id' => 3, 'name' => 'Phum 2'],
            ['id' => 27, 'commune_id' => 3, 'name' => 'Phum 3'],
            ['id' => 28, 'commune_id' => 3, 'name' => 'Phum 4'],
            ['id' => 29, 'commune_id' => 3, 'name' => 'Phum 5'],
            ['id' => 30, 'commune_id' => 3, 'name' => 'Phum 6'],
            ['id' => 31, 'commune_id' => 3, 'name' => 'Phum 7'],
            ['id' => 32, 'commune_id' => 4, 'name' => 'Phum 1'],
            ['id' => 33, 'commune_id' => 4, 'name' => 'Phum 2'],
            ['id' => 34, 'commune_id' => 4, 'name' => 'Phum 3'],
            ['id' => 35, 'commune_id' => 4, 'name' => 'Phum 4'],
            ['id' => 36, 'commune_id' => 4, 'name' => 'Phum 5'],
            ['id' => 37, 'commune_id' => 5, 'name' => 'Phum 1'],
            ['id' => 38, 'commune_id' => 5, 'name' => 'Phum 2'],
            ['id' => 39, 'commune_id' => 5, 'name' => 'Phum 3'],
            ['id' => 40, 'commune_id' => 5, 'name' => 'Phum 4'],
            ['id' => 41, 'commune_id' => 6, 'name' => 'Phum 1'],
            ['id' => 42, 'commune_id' => 6, 'name' => 'Phum 2'],
            ['id' => 43, 'commune_id' => 6, 'name' => 'Phum 3'],
            ['id' => 44, 'commune_id' => 6, 'name' => 'Phum 4'],
            ['id' => 45, 'commune_id' => 6, 'name' => 'Phum 5'],
            ['id' => 46, 'commune_id' => 6, 'name' => 'Phum 6'],
            ['id' => 47, 'commune_id' => 6, 'name' => 'Phum 7'],
            ['id' => 48, 'commune_id' => 6, 'name' => 'Phum 8'],
            ['id' => 49, 'commune_id' => 6, 'name' => 'Phum 9'],
            ['id' => 50, 'commune_id' => 6, 'name' => 'Phum 10'],
            ['id' => 51, 'commune_id' => 6, 'name' => 'Phum 11'],
            ['id' => 52, 'commune_id' => 6, 'name' => 'Phum 12'],
            ['id' => 53, 'commune_id' => 6, 'name' => 'Phum 13'],
            ['id' => 54, 'commune_id' => 6, 'name' => 'Phum 14'],
            ['id' => 55, 'commune_id' => 6, 'name' => 'Phum 15'],
            ['id' => 56, 'commune_id' => 6, 'name' => 'Phum 16'],
            ['id' => 57, 'commune_id' => 6, 'name' => 'Phum 17'],
            ['id' => 58, 'commune_id' => 6, 'name' => 'Phum 18'],
            ['id' => 59, 'commune_id' => 6, 'name' => 'Phum 19'],
            ['id' => 60, 'commune_id' => 6, 'name' => 'Phum 20'],
            ['id' => 61, 'commune_id' => 6, 'name' => 'Phum 21'],
            ['id' => 62, 'commune_id' => 6, 'name' => 'Phum 22'],
            ['id' => 63, 'commune_id' => 6, 'name' => 'Phum 23'],
            ['id' => 64, 'commune_id' => 6, 'name' => 'Phum 24'],
            ['id' => 65, 'commune_id' => 7, 'name' => 'Phum 1'],
            ['id' => 66, 'commune_id' => 7, 'name' => 'Phum 2'],
            ['id' => 67, 'commune_id' => 7, 'name' => 'Phum 3'],
            ['id' => 68, 'commune_id' => 7, 'name' => 'Phum 4'],
            ['id' => 69, 'commune_id' => 7, 'name' => 'Phum 5'],
            ['id' => 71, 'commune_id' => 7, 'name' => 'Phum 6'],
            // ['id' => 71, 'commune_id' => 7, 'name' => 'Phum 7'],
            ['id' => 72, 'commune_id' => 7, 'name' => 'Phum 8'],
            ['id' => 73, 'commune_id' => 7, 'name' => 'Phum 9'],
            ['id' => 74, 'commune_id' => 7, 'name' => 'Phum 10'],
            ['id' => 75, 'commune_id' => 8, 'name' => 'Phum 1'],
            ['id' => 76, 'commune_id' => 8, 'name' => 'Phum 2'],
            ['id' => 77, 'commune_id' => 8, 'name' => 'Phum 3'],
            ['id' => 78, 'commune_id' => 8, 'name' => 'Phum 4'],
            ['id' => 79, 'commune_id' => 8, 'name' => 'Phum 5'],
            ['id' => 80, 'commune_id' => 8, 'name' => 'Phum 6'],
            ['id' => 81, 'commune_id' => 8, 'name' => 'Phum 7'],
            ['id' => 82, 'commune_id' => 8, 'name' => 'Phum 8'],
            ['id' => 83, 'commune_id' => 8, 'name' => 'Phum 9'],
            ['id' => 84, 'commune_id' => 8, 'name' => 'Phum 10'],
            ['id' => 85, 'commune_id' => 9, 'name' => 'Phum 1'],
            ['id' => 86, 'commune_id' => 9, 'name' => 'Phum 2'],
            ['id' => 87, 'commune_id' => 9, 'name' => 'Phum 3'],
            ['id' => 88, 'commune_id' => 9, 'name' => 'Phum 4'],
            ['id' => 89, 'commune_id' => 9, 'name' => 'Phum 5'],
            ['id' => 90, 'commune_id' => 10, 'name' => 'Phum 1'],
            ['id' => 91, 'commune_id' => 10, 'name' => 'Phum 2'],
            ['id' => 92, 'commune_id' => 10, 'name' => 'Phum 3'],
            ['id' => 93, 'commune_id' => 10, 'name' => 'Phum 4'],
            ['id' => 94, 'commune_id' => 10, 'name' => 'Phum 5'],
            ['id' => 95, 'commune_id' => 10, 'name' => 'Phum 6'],
            ['id' => 96, 'commune_id' => 10, 'name' => 'Phum 7'],
            ['id' => 97, 'commune_id' => 10, 'name' => 'Phum 8'],
            ['id' => 98, 'commune_id' => 10, 'name' => 'Phum 9'],
            ['id' => 99, 'commune_id' => 10, 'name' => 'Phum 10'],
            ['id' => 100, 'commune_id' => 10, 'name' => 'Phum 11'],
            ['id' => 101, 'commune_id' => 11, 'name' => 'Phum 1'],
            ['id' => 102, 'commune_id' => 11, 'name' => 'Phum 2'],
            ['id' => 103, 'commune_id' => 11, 'name' => 'Phum 3'],
            ['id' => 104, 'commune_id' => 11, 'name' => 'Phum 4'],
            ['id' => 105, 'commune_id' => 11, 'name' => 'Phum 5'],
            ['id' => 106, 'commune_id' => 11, 'name' => 'Phum 6'],
            ['id' => 107, 'commune_id' => 11, 'name' => 'Phum 7'],
            ['id' => 108, 'commune_id' => 11, 'name' => 'Phum 8'],
            ['id' => 109, 'commune_id' => 11, 'name' => 'Phum 10'],
            ['id' => 110, 'commune_id' => 11, 'name' => 'Phum 11'],
            ['id' => 111, 'commune_id' => 12, 'name' => 'Phum 1'],
            ['id' => 112, 'commune_id' => 12, 'name' => 'Phum 2'],
            ['id' => 113, 'commune_id' => 12, 'name' => 'Phum 3'],
            ['id' => 114, 'commune_id' => 12, 'name' => 'Phum 4'],
            ['id' => 115, 'commune_id' => 12, 'name' => 'Phum 5'],
            ['id' => 116, 'commune_id' => 12, 'name' => 'Phum 6'],
            ['id' => 117, 'commune_id' => 12, 'name' => 'Phum 7'],
            ['id' => 118, 'commune_id' => 12, 'name' => 'Phum 8'],
            ['id' => 119, 'commune_id' => 13, 'name' => 'Phum 1'],
            ['id' => 120, 'commune_id' => 13, 'name' => 'Phum 2'],
            ['id' => 121, 'commune_id' => 13, 'name' => 'Phum 3'],
            ['id' => 122, 'commune_id' => 13, 'name' => 'Phum 4'],
            ['id' => 123, 'commune_id' => 13, 'name' => 'Phum 5'],
            ['id' => 124, 'commune_id' => 13, 'name' => 'Phum 6'],
            ['id' => 125, 'commune_id' => 13, 'name' => 'Phum 7'],
            ['id' => 126, 'commune_id' => 13, 'name' => 'Phum 8'],
            ['id' => 127, 'commune_id' => 13, 'name' => 'Phum 9'],
            ['id' => 128, 'commune_id' => 13, 'name' => 'Phum 10'],
            ['id' => 129, 'commune_id' => 13, 'name' => 'Phum 11'],
            ['id' => 130, 'commune_id' => 14, 'name' => 'Phum 1'],
            ['id' => 131, 'commune_id' => 14, 'name' => 'Phum 2'],
            ['id' => 132, 'commune_id' => 14, 'name' => 'Phum 3'],
            ['id' => 133, 'commune_id' => 14, 'name' => 'Phum 4'],
            ['id' => 134, 'commune_id' => 14, 'name' => 'Phum 5'],
            ['id' => 135, 'commune_id' => 14, 'name' => 'Phum 6'],
            ['id' => 136, 'commune_id' => 14, 'name' => 'Phum 7'],
            ['id' => 137, 'commune_id' => 14, 'name' => 'Phum 8'],
            ['id' => 138, 'commune_id' => 14, 'name' => 'Phum 9'],
            ['id' => 139, 'commune_id' => 15, 'name' => 'Phum 1'],
            ['id' => 140, 'commune_id' => 15, 'name' => 'Phum 2'],
            ['id' => 141, 'commune_id' => 15, 'name' => 'Phum 3'],
            ['id' => 142, 'commune_id' => 15, 'name' => 'Phum 4'],
            ['id' => 143, 'commune_id' => 15, 'name' => 'Phum 5'],
            ['id' => 144, 'commune_id' => 15, 'name' => 'Phum 6'],
            ['id' => 145, 'commune_id' => 15, 'name' => 'Phum 7'],
            ['id' => 146, 'commune_id' => 15, 'name' => 'Phum 8'],
            ['id' => 147, 'commune_id' => 15, 'name' => 'Phum 9'],
            ['id' => 148, 'commune_id' => 16, 'name' => 'Phum 1'],
            ['id' => 149, 'commune_id' => 16, 'name' => 'Phum 2'],
            ['id' => 150, 'commune_id' => 16, 'name' => 'Phum 3'],
            ['id' => 151, 'commune_id' => 16, 'name' => 'Phum 4'],
            ['id' => 152, 'commune_id' => 16, 'name' => 'Phum 5'],
            ['id' => 153, 'commune_id' => 16, 'name' => 'Phum 6'],
            ['id' => 154, 'commune_id' => 16, 'name' => 'Phum 7'],
            ['id' => 155, 'commune_id' => 16, 'name' => 'Phum 8'],
            ['id' => 156, 'commune_id' => 16, 'name' => 'Phum 9'],
            ['id' => 157, 'commune_id' => 17, 'name' => 'Phum 1'],
            ['id' => 158, 'commune_id' => 17, 'name' => 'Phum 2'],
            ['id' => 159, 'commune_id' => 17, 'name' => 'Phum 3'],
            ['id' => 160, 'commune_id' => 17, 'name' => 'Phum 4'],
            ['id' => 161, 'commune_id' => 17, 'name' => 'Phum 5'],
            ['id' => 162, 'commune_id' => 17, 'name' => 'Phum 6'],
            ['id' => 163, 'commune_id' => 17, 'name' => 'Phum 7'],
            ['id' => 164, 'commune_id' => 17, 'name' => 'Phum 8'],
            ['id' => 165, 'commune_id' => 17, 'name' => 'Phum 9'],
            ['id' => 166, 'commune_id' => 18, 'name' => 'Phum 1'],
            ['id' => 167, 'commune_id' => 18, 'name' => 'Phum 2'],
            ['id' => 168, 'commune_id' => 18, 'name' => 'Phum 3'],
            ['id' => 169, 'commune_id' => 18, 'name' => 'Phum 4'],
            ['id' => 170, 'commune_id' => 18, 'name' => 'Phum 5'],
            ['id' => 171, 'commune_id' => 18, 'name' => 'Phum 6'],
            ['id' => 172, 'commune_id' => 18, 'name' => 'Phum 7'],
            ['id' => 173, 'commune_id' => 18, 'name' => 'Phum 8'],
            ['id' => 174, 'commune_id' => 18, 'name' => 'Phum 9'],
            ['id' => 175, 'commune_id' => 18, 'name' => 'Phum 10'],
            ['id' => 176, 'commune_id' => 19, 'name' => 'Phum 1'],
            ['id' => 177, 'commune_id' => 19, 'name' => 'Phum 2'],
            ['id' => 178, 'commune_id' => 19, 'name' => 'Phum 3'],
            ['id' => 179, 'commune_id' => 19, 'name' => 'Phum 4'],
            ['id' => 180, 'commune_id' => 19, 'name' => 'Phum 5'],
            ['id' => 181, 'commune_id' => 19, 'name' => 'Phum 6'],
            ['id' => 182, 'commune_id' => 19, 'name' => 'Phum 7'],
            ['id' => 183, 'commune_id' => 19, 'name' => 'Phum 8'],
            ['id' => 184, 'commune_id' => 19, 'name' => 'Phum 9'],
            ['id' => 185, 'commune_id' => 19, 'name' => 'Phum 10'],
            ['id' => 186, 'commune_id' => 19, 'name' => 'Phum 11'],
            ['id' => 187, 'commune_id' => 19, 'name' => 'Phum 12'],
        ];
        foreach ($villages as $village) {
            Village::create($village);
        }
    }
}