<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Prestasi;
use Carbon\Carbon;



class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin.dashboard', [
            'totalSiswa' => Siswa::count(),
            'totalKelas' => Kelas::count(),
            'totalPelanggaran' => Pelanggaran::count(),
            'totalPrestasi' => Prestasi::count(),
    
            'pelanggaranTerbaru' => Pelanggaran::with(['siswa'])
                ->latest()
                ->limit(5)
                ->get(),
    
            'prestasiTerbaru' => Prestasi::with(['siswa'])
                ->latest()
                ->limit(5)
                ->get(),
        ]);
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
        return view('dashboard.petugas.dashboard', [
            'totalSiswa' => Siswa::count(),
            'pelanggaranHariIni' => Pelanggaran::whereDate('created_at', Carbon::today())->count(),
            'prestasiHariIni' => Prestasi::whereDate('created_at', Carbon::today())->count(),
    
            'pelanggaranTerbaru' => Pelanggaran::with('siswa')
                ->latest()
                ->limit(5)
                ->get(),
        ]);
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
