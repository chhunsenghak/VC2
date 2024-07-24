<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LimitDurationType;

class LimitDurationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limitDurationTypes = [
            ['name' => 'Monthly'],
            ['name' => 'Quarterly'],
            ['name' => 'Yearly'],
        ];

        foreach ($limitDurationTypes as $limitDuration) {
            LimitDurationType::create($limitDuration);
        }
    }
}
