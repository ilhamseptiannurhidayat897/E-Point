<?php

namespace App\Imports;

use App\Models\JenisPelanggaran;
use Maatwebsite\Excel\Concerns\ToModel;

class JenisPelanggaranImport implements ToModel
{
    public function model(array $row)
    {
        // Skip baris kosong
        if (empty($row[0]) || !isset($row[1])) {
            return null;
        }

        $nama = trim($row[0]);
        $poin = (int) $row[1]; // boleh minus

        // Cegah duplikat berdasarkan nama
        if (JenisPelanggaran::where('nama', $nama)->exists()) {
            return null;
        }

        return JenisPelanggaran::create([
            'nama' => $nama,
            'poin' => $poin,
        ]);
    }
}
