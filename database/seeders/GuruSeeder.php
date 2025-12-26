<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        Guru::create([
            'user_id' => 2,
            'nip' => '2001',
            'nama' => 'Guru Contoh',
        ]);
    }
}
