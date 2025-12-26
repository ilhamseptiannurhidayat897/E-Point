<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        Petugas::create([
            'user_id' => 3,
            'nk' => '1001',
            'nama' => 'Petugas Contoh',
        ]);
    }
}
