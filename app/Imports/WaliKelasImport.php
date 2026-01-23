<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Kelas;
use App\Models\WaliKelas;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class WaliKelasImport implements ToModel
{
    public function model(array $row)
    {
        // Skip baris kosong
        if (empty($row[0]) || empty($row[1]) || empty($row[2])) {
            return null;
        }

        $nip       = trim($row[0]);
        $nama      = trim($row[1]);
        $namaKelas = preg_replace('/\s+/', ' ', strtoupper(trim($row[2])));

        // Cari kelas berdasarkan nama_kelas
        $kelas = Kelas::where('nama_kelas', $namaKelas)->first();
        if (!$kelas) {
            return null; // kelas tidak ditemukan
        }

        // Cegah duplikat wali kelas
        if (WaliKelas::where('nip', $nip)->exists()) {
            return null;
        }

        // Buat user
        $user = User::create([
            'login_id' => $nip,
            'password' => Hash::make('12345678'), // password default
            'role'     => 'wali_kelas',
        ]);

        // Simpan ke tabel wali_kelas
        return WaliKelas::create([
            'user_id'  => $user->id,
            'kelas_id' => $kelas->id,
            'nip'      => $nip,
            'nama'     => $nama,
        ]);
    }
}
