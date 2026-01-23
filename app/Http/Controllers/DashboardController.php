<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Prestasi;
use App\Models\JenisPelanggaran;
use App\Models\JenisPrestasi;
use App\Models\WaliKelas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;



class DashboardController extends Controller
{
   
   
    public function admin()
    {
        // Statistik dasar
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalPelanggaran = Pelanggaran::count();
        $totalPrestasi = Prestasi::count();
        
        // Data bulan ini
        $pelanggaranBulanIni = Pelanggaran::whereMonth('created_at', Carbon::now()->month)
                                        ->whereYear('created_at', Carbon::now()->year)
                                        ->count();
        $prestasiBulanIni = Prestasi::whereMonth('created_at', Carbon::now()->month)
                                   ->whereYear('created_at', Carbon::now()->year)
                                   ->count();
        
        // Data untuk chart (6 bulan terakhir)
        $chartLabels = [];
        $chartPelanggaran = [];
        $chartPrestasi = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $chartLabels[] = $month->translatedFormat('M Y');
            
            $chartPelanggaran[] = Pelanggaran::whereMonth('created_at', $month->month)
                                           ->whereYear('created_at', $month->year)
                                           ->count();
            
            $chartPrestasi[] = Prestasi::whereMonth('created_at', $month->month)
                                      ->whereYear('created_at', $month->year)
                                      ->count();
        }
        
        // Data terbaru
        $pelanggaranTerbaru = Pelanggaran::with(['siswa.kelas', 'jenisPelanggaran'])
                                       ->latest()
                                       ->take(5)
                                       ->get();
        
        $prestasiTerbaru = Prestasi::with(['siswa.kelas', 'jenis'])
                                 ->latest()
                                 ->take(5)
                                 ->get();
        
        // Top siswa pelanggaran
        $topPelanggaran = Siswa::withCount('pelanggaran')
                             ->orderBy('pelanggaran_count', 'desc')
                             ->take(5)
                             ->get();
        
        // Top siswa prestasi
        $topPrestasi = Siswa::withCount('prestasi')
                           ->orderBy('prestasi_count', 'desc')
                           ->take(5)
                           ->get();
        
        // Total pengguna
        $totalBK = User::where('role', 'bk')->count();
        $totalWaliKelas = User::where('role', 'wali_kelas')->count();
        $totalPetugas = User::where('role', 'petugas')->count();
        
        return view('dashboard.admin.dashboard', compact(
            'totalSiswa',
            'totalKelas',
            'totalPelanggaran',
            'totalPrestasi',
            'pelanggaranBulanIni',
            'prestasiBulanIni',
            'chartLabels',
            'chartPelanggaran',
            'chartPrestasi',
            'pelanggaranTerbaru',
            'prestasiTerbaru',
            'topPelanggaran',
            'topPrestasi',
            'totalBK',
            'totalWaliKelas',
            'totalPetugas'
        ));
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
        

$petugasId = Petugas::where('user_id', auth()->id())->value('id');


    
        return view('dashboard.petugas.dashboard', [
            // Statistik Umum
            'totalSiswa' => Siswa::count(),
            
            // Pelanggaran Hari Ini (semua petugas)
            'pelanggaranHariIni' => Pelanggaran::whereDate('created_at', Carbon::today())->count(),
            
            // Prestasi Hari Ini (semua petugas)
            'prestasiHariIni' => Prestasi::whereDate('created_at', Carbon::today())->count(),
            
            // Total Input yang dibuat oleh petugas yang sedang login
            'totalInputSaya' =>
            Pelanggaran::where('petugas_id', $petugasId)->count()
            +
            Prestasi::where('petugas_id', $petugasId)->count(),
    

            
            // Pelanggaran Terbaru (5 data terakhir dengan relasi siswa dan jenis pelanggaran)
            'pelanggaranTerbaru' => Pelanggaran::with(['siswa.kelas', 'jenispelanggaran'])
                ->latest()
                ->limit(5)
                ->get(),
            
            // Prestasi Terbaru (5 data terakhir dengan relasi siswa dan jenis prestasi)
            'prestasiTerbaru' => Prestasi::with(['siswa.kelas', 'jenis'])
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
