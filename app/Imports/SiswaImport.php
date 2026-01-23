<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        // Skip baris kosong
        if (empty($row[0]) || empty($row[1]) || empty($row[2]) || empty($row[3])) {
            return null;
        }

        $nis        = trim($row[0]);
        $nama       = trim($row[1]);
        $jk         = strtoupper(trim($row[2]));
        $namaKelas  = preg_replace('/\s+/', ' ', strtoupper(trim($row[3])));
        $alamat     = $row[4] ?? null;

        // Validasi JK
        if (!in_array($jk, ['L','P'])) {
            return null;
        }

        // Cari kelas berdasarkan nama_kelas
        $kelas = Kelas::where('nama_kelas', $namaKelas)->first();
        if (!$kelas) {
            return null;
        }

        // Cegah NIS dobel
        if (Siswa::where('nis', $nis)->exists()) {
            return null;
        }

        // Buat user siswa
        $user = User::create([
            'login_id' => $nis,
            'password' => Hash::make('12345678'),
            'role'     => 'siswa',
        ]);

        // Simpan ke tabel siswa
        return Siswa::create([
            'user_id'  => $user->id,
            'kelas_id' => $kelas->id,
            'nis'      => $nis,
            'nama'     => $nama,
            'jk'       => $jk,
            'poin'     => 0,
            'alamat'   => $alamat,
        ]);
    }
}
