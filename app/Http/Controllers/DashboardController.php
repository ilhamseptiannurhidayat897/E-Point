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
use Illuminate\Support\Facades\Auth;



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
        // ambil wali kelas yang login
        $user = Auth::user();
        $waliKelas = $user->waliKelas;

        if (!$waliKelas || !$waliKelas->kelas_id) {
            abort(403, 'Anda belum memiliki kelas');
        }

        $kelasId = $waliKelas->kelas_id;

        return view('dashboard.wali_kelas.dashboard', [
            // TOTAL SISWA DI KELAS
            'totalSiswa' => Siswa::where('kelas_id', $kelasId)->count(),

            // TOTAL PELANGGARAN SISWA DI KELAS
            'totalPelanggaran' => Pelanggaran::whereHas('siswa', function ($q) use ($kelasId) {
                $q->where('kelas_id', $kelasId);
            })->count(),

            // TOTAL PRESTASI SISWA DI KELAS
            'totalPrestasi' => Prestasi::whereHas('siswa', function ($q) use ($kelasId) {
                $q->where('kelas_id', $kelasId);
            })->count(),

            // TOTAL POIN KELAS
            'totalPoin' => Siswa::where('kelas_id', $kelasId)->sum('poin'),
        ]);
    }

    public function siswa()
    {
        $siswa = Auth::user()->siswa;

        // TOTAL PRESTASI (HANYA YANG DITERIMA)
        $totalPrestasi = Prestasi::where('siswa_id', $siswa->id)
            ->where('status', 'diterima')
            ->with('jenis')
            ->get()
            ->sum(fn ($item) => $item->jenis->poin);

        // TOTAL PELANGGARAN (HANYA YANG DITERIMA)
        $totalPelanggaran = Pelanggaran::where('siswa_id', $siswa->id)
            ->where('status', 'diterima')
            ->with('jenisPelanggaran')
            ->get()
            ->sum(fn ($item) => $item->jenisPelanggaran->poin);

        // TOTAL POIN AKHIR
        $totalPoin = $totalPrestasi - $totalPelanggaran;

        return view('dashboard.siswa.dashboard', compact(
            'totalPrestasi',
            'totalPelanggaran',
            'totalPoin'
        ));
}

}
