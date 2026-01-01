<?php

namespace Database\Seeders;

use App\Models\WaliKelas;
use Illuminate\Database\Seeder;

class walikelasSeeder extends Seeder
{
    public function run(): void
    {
        WaliKelas::create([
            'user_id' => 2,
            'nip' => '2001',
            'nama' => 'waliKlas Contoh',
        ]);
    }
}
