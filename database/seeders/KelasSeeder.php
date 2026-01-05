<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        Kelas::create([
            'tingkat'      => 'XI',
            'jurusan'      => 'PPLG',
            'konsentrasi'  => null, // karena bukan GIM
            'nomor'        => 1,
            'nama_kelas'   => 'XI PPLG 1',
        ]);
    }
}
