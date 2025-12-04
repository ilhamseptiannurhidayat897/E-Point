<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GoodPointType;

class GoodPointTypeSeeder extends Seeder
{
    public function run(): void
    {
        $goodPoints = [
            ['code' => 'G01', 'name' => 'Piket Terbaik', 'points' => 5],
            ['code' => 'G02', 'name' => 'Membantu Guru', 'points' => 10],
            ['code' => 'G03', 'name' => 'Prestasi Lomba', 'points' => 20],
        ];

        foreach ($goodPoints as $gp) {
            GoodPointType::create($gp);
        }
    }
}
