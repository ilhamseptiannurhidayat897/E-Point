<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BK;

class BKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BK::create([
            'user_id' => 5,
            'nip' => '5001',
            'nama' => 'Petugas Contoh',
        ]);
    }
}
