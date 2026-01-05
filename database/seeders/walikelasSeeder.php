<?php

namespace Database\Seeders;

use App\Models\WaliKelas;
use Illuminate\Database\Seeder;

class WaliKelasSeeder extends Seeder
{
    public function run(): void
    {
        WaliKelas::create([
            'user_id' => 1,
            'kelas_id' => 1,
            'nip' => '2001',
            'nama' => 'bzir',
        ]);
    }
}
