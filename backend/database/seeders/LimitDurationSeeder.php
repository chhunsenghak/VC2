<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LimitDuration;

class LimitDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limitDurations = [
            ['id' => 1, 'price' => '20000', 'durations' => 1, 'limit_duration_type_id' => 1],
            ['id' => 2, 'price' => '40000', 'durations' => 1, 'limit_duration_type_id' => 2],
            ['id' => 3, 'price' => '4000', 'durations' => 1, 'limit_duration_type_id' => 3],
        ];
        foreach ($limitDurations as $item) {
            LimitDuration::create($item);
        }
    }
}
