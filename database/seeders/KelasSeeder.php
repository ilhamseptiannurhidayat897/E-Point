<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa contoh data kelas
        // Field 'konsentrasi' sudah tidak lagi digunakan

        Kelas::create([
            'tingkat'      => 'X',
            'jurusan'      => 'RPL',
            'nomor'        => 1,
            'nama_kelas'   => 'X RPL 1',
        ]);


        $this->command->info('Contoh data kelas berhasil dibuat!');
    }
}