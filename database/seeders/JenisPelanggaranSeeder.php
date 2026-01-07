<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisPelanggaran;

class JenisPelanggaranSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Bolos',
                'poin' => 50,
            ],
            [
                'nama' => 'Telat',
                'poin' => 40,
            ],
            [
                'nama' => 'Merokok',
                'poin' => 30,
            ],
        ];

        foreach ($data as $item) {
            JenisPelanggaran::create($item);
        }
    }
}
