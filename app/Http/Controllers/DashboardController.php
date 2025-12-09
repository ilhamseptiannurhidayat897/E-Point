<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard untuk role Petugas/Admin.
     * Dashboard ini berisi statistik keseluruhan sistem.
     */
    public function petugas()
    {
        $user = Auth::user();

        // --- Inisialisasi variabel statistik ---
        // Menggunakan nilai dummy jika model belum dibuat, agar tidak error
        $jumlahSiswa = \App\Models\Student::count() ?? 1800;
        $jumlahGuru = \App\Models\User::where('role', 'guru')->count() ?? 3;
        $jumlahPelanggaranJenis = 10;
        $jumlahKebaikanJenis = 15;
        $jumlahTransaksiPelanggaran =  7;
        $jumlahTransaksiKebaikan =  7;

        return view('officer/dashboard', [
            'user' => $user,
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahPelanggaranJenis' => $jumlahPelanggaranJenis,
            'jumlahKebaikanJenis' => $jumlahKebaikanJenis,
            'jumlahTransaksiPelanggaran' => $jumlahTransaksiPelanggaran,
            'jumlahTransaksiKebaikan' => $jumlahTransaksiKebaikan,
        ]);
        
    }

    /**
     * Menampilkan dashboard untuk role Guru.
     * Dashboard ini berisi informasi terkait siswa yang diajar oleh guru.
     */
    public function guru()
    {
        $user = Auth::user();
        // TODO: Ambil data siswa per kelas guru, pelanggaran di kelas guru, dll.
        return view('teacher.dashboard', compact('user'));
    }

    /**
     * Menampilkan dashboard untuk role Siswa.
     * Dashboard ini berisi informasi poin pribadi siswa.
     */
    public function siswa()
    {
        $user = Auth::user();
        // TODO: Ambil data poin pelanggaran, poin kebaikan, dan riwayat siswa.
        return view('students.dashboard', compact('user'));
    }
}