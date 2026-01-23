<?php

namespace App\Imports;

use App\Models\JenisPrestasi;
use Maatwebsite\Excel\Concerns\ToModel;

class JenisPrestasiImport implements ToModel
{
    public function model(array $row)
    {
        // Skip baris kosong
        if (empty($row[0]) || empty($row[1])) {
            return null;
        }

        $nama = trim($row[0]);
        $poin = (int) $row[1];

        // Cegah duplikat berdasarkan nama
        if (JenisPrestasi::where('nama', $nama)->exists()) {
            return null;
        }

        return JenisPrestasi::create([
            'nama' => $nama,
            'poin' => $poin,
        ]);
    }
}
