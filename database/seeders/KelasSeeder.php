<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $tingkat = ['X', 'XI', 'XII'];

        $jurusan = [
            'TO'   => [],
            'TJKT' => [],
            'DPIB' => [],
            'MPLB' => [],
            'AKL'  => [],
            'SP'   => [],
            'PPLG' => ['GIM', 'RPL'], // sub jurusan
        ];

        foreach ($tingkat as $t) {
            foreach ($jurusan as $j => $konsentrasi) {

                // PPLG punya sub jurusan
                if ($j === 'PPLG') {
                    foreach ($konsentrasi as $k) {
                        for ($i = 1; $i <= 2; $i++) {
                            Kelas::create([
                                'tingkat'      => $t,
                                'jurusan'      => $j,
                                'konsentrasi'  => $k,
                                'nomor'        => $i,
                                'nama_kelas'   => "$t $j $k $i",
                            ]);
                        }
                    }
                } 
                // jurusan lain
                else {
                    for ($i = 1; $i <= 2; $i++) {
                        Kelas::create([
                            'tingkat'      => $t,
                            'jurusan'      => $j,
                            'konsentrasi'  => null,
                            'nomor'        => $i,
                            'nama_kelas'   => "$t $j $i",
                        ]);
                    }
                }
            }
        }
    }
}
