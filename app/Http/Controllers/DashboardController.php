<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Pelanggaran;
use App\Models\Siswa;


class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin.dashboard');
    }

   
    public function bk()
    {
        return view('dashboard.bk.dashboard', [
            // CARD
            'totalPelanggaran' => Pelanggaran::count(),
            'pending' => Pelanggaran::where('status', 'pending')->count(),
            'verifikasi' => Pelanggaran::where('status', 'verifikasi')->count(),
            'totalSiswa' => Siswa::count(),
    
            // TABLE
            'pelanggaranTerbaru' => Pelanggaran::with(['siswa','jenisPelanggaran'])
                ->latest()
                ->limit(5)
                ->get(),
        ]);
    }
    

    public function petugas()
    {
        return view('dashboard.petugas.dashboard');
    }

    public function wali_kelas()
    {
        return view('dashboard.wali_kelas.dashboard');
    }

    public function siswa()
    {
        return view('dashboard.siswa.dashboard');
    }
}
