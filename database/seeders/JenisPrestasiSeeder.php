<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisPrestasi;

class JenisPrestasiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Juara 1 Lomba Akademik',
                'poin' => 50,
            ],
            [
                'nama' => 'Juara 2 Lomba Akademik',
                'poin' => 40,
            ],
            [
                'nama' => 'Juara 3 Lomba Akademik',
                'poin' => 30,
            ],
        ];

        foreach ($data as $item) {
            JenisPrestasi::create($item);
        }
    }
}
