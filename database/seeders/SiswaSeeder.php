<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::create([
            'user_id' => 1, // HARUS SAMA DENGAN users
            'nis' => '3001',
            'nama' => 'Siswa Contoh',
            'jk' => 'L',
            'kelas' => 'X',
        ]);
    }
}
