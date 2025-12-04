<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ViolationType;

class ViolationTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['code' => 'P01', 'name' => 'Datang Terlambat', 'points' => 5, 'description' => 'Siswa datang setelah bel masuk'],
            ['code' => 'P02', 'name' => 'Tidak Memakai Seragam', 'points' => 10, 'description' => 'Seragam tidak sesuai aturan'],
            ['code' => 'P03', 'name' => 'Tidak Masuk Tanpa Keterangan', 'points' => 15, 'description' => 'Alpha'],
            ['code' => 'P04', 'name' => 'Merokok di Area Sekolah', 'points' => 50, 'description' => 'Pelanggaran berat'],
            ['code' => 'P05', 'name' => 'Berkelahi', 'points' => 75, 'description' => 'Pelanggaran berat & berbahaya'],
        ];

        foreach ($types as $t) {
            ViolationType::create($t);
        }
    }
}
