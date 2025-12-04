<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // gunakan nilai nyata bila model tersedia, kalau tidak fallback ke angka dummy
        $jumlahSiswa = 0;
        $jumlahGuru = 0;
        $jumlahJurusan = 0;
        $jumlahKelas = 0;
        $jumlahPelanggaranJenis = 0;
        $jumlahKebaikanJenis = 0;
        $jumlahTransaksiPelanggaran = 0;
        $jumlahTransaksiKebaikan = 0;

        // jika model ada, ambil dari DB
        if (class_exists(\App\Models\Student::class)) {
            $jumlahSiswa = \App\Models\Student::count();
        } else {
            $jumlahSiswa = 1800; // placeholder
        }

        if (class_exists(\App\Models\User::class)) {
            // anggap User yang punya role 'guru' -> jika belum ada, fallback
            try {
                $jumlahGuru = \App\Models\User::where('role','guru')->count() ?: 3;
            } catch (\Throwable $e) {
                $jumlahGuru = 3;
            }
        } else {
            $jumlahGuru = 3;
        }

        if (class_exists(\App\Models\ViolationType::class)) {
            $jumlahPelanggaranJenis = \App\Models\ViolationType::count();
        } else {
            $jumlahPelanggaranJenis = 10;
        }

        if (class_exists(\App\Models\GoodPointType::class)) {
            $jumlahKebaikanJenis = \App\Models\GoodPointType::count();
        } else {
            $jumlahKebaikanJenis = 15;
        }

        if (class_exists(\App\Models\Violation::class)) {
            $jumlahTransaksiPelanggaran = \App\Models\Violation::count();
        } else {
            $jumlahTransaksiPelanggaran = 7;
        }

        if (class_exists(\App\Models\GoodPoint::class)) {
            $jumlahTransaksiKebaikan = \App\Models\GoodPoint::count();
        } else {
            $jumlahTransaksiKebaikan = 7;
        }

        if (class_exists(\App\Models\Kelas::class)) {
            $jumlahKelas = \App\Models\Kelas::count();
        } else {
            $jumlahKelas = 50;
        }

        if (class_exists(\App\Models\Jurusan::class)) {
            $jumlahJurusan = \App\Models\Jurusan::count();
        } else {
            $jumlahJurusan = 7;
        }

        return view('dashboard', compact(
            'jumlahSiswa',
            'jumlahGuru',
            'jumlahJurusan',
            'jumlahKelas',
            'jumlahPelanggaranJenis',
            'jumlahKebaikanJenis',
            'jumlahTransaksiPelanggaran',
            'jumlahTransaksiKebaikan'
        ));
    }
}
