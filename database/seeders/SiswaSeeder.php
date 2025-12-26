<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::create([
            'user_id' => 1,        // pastikan user id 1 ada
            'nis' => '3001',
            'nama' => 'Siswa Contoh',
            'jk' => 'L',
            'kelas_id' => 1,       // ✅ BUKAN "kelas"
        ]);
    }
}
