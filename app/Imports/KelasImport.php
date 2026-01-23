<?php

namespace App\Imports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;

class KelasImport implements ToModel
{
    public function model(array $row)
    {
        // skip baris kosong
        if (empty($row[0]) || empty($row[1])) {
            return null;
        }

        $tingkat = strtoupper(trim($row[0]));
        $jurusan = strtoupper(trim($row[1]));
        $nomor   = isset($row[2]) && $row[2] !== '' ? (int)$row[2] : null;

        // proteksi ENUM
        if (!in_array($tingkat, ['X','XI','XII'])) return null;
        if (!in_array($jurusan, ['TO','TJKT','GIM','RPL','DPIB','MPLB','AKL','SP'])) return null;

        return Kelas::create([
            'tingkat'    => $tingkat,
            'jurusan'    => $jurusan,
            'nomor'      => $nomor,
            'nama_kelas' => trim("$tingkat $jurusan $nomor"),
        ]);
    }
}
