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
    /* =======================
     * STATISTIK UTAMA (FINAL)
     * ======================= */
    $totalSiswa = Siswa::count();
    $totalKelas = Kelas::count();

    // ADMIN HANYA LIHAT YANG SUDAH DISETUJUI
    $totalPelanggaran = Pelanggaran::where('status', 'diterima')->count();
    $totalPrestasi    = Prestasi::where('status', 'diterima')->count();


    /* =======================
     * DATA BULAN INI
     * ======================= */
    $pelanggaranBulanIni = Pelanggaran::where('status', 'diterima')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();

    $prestasiBulanIni = Prestasi::where('status', 'diterima')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();


    /* =======================
     * DATA CHART (6 BULAN)
     * ======================= */
    $chartLabels = [];
    $chartPelanggaran = [];
    $chartPrestasi = [];

    for ($i = 5; $i >= 0; $i--) {
        $month = now()->subMonths($i);

        $chartLabels[] = $month->translatedFormat('M Y');

        $chartPelanggaran[] = Pelanggaran::where('status', 'diterima')
            ->whereMonth('created_at', $month->month)
            ->whereYear('created_at', $month->year)
            ->count();

        $chartPrestasi[] = Prestasi::where('status', 'diterima')
            ->whereMonth('created_at', $month->month)
            ->whereYear('created_at', $month->year)
            ->count();
    }


    /* =======================
     * DATA TERBARU (FINAL)
     * ======================= */
    $pelanggaranTerbaru = Pelanggaran::with([
            'siswa.kelas',
            'jenisPelanggaran'
        ])
        ->where('status', 'diterima')
        ->latest()
        ->limit(5)
        ->get();

    $prestasiTerbaru = Prestasi::with([
            'siswa.kelas',
            'jenis'
        ])
        ->where('status', 'diterima')
        ->latest()
        ->limit(5)
        ->get();


    /* =======================
     * TOP SISWA (HASIL AKHIR)
     * ======================= */
    $topPelanggaran = Siswa::withCount([
            'pelanggaran as pelanggaran_count' => fn ($q) =>
                $q->where('status', 'diterima')
        ])
        ->orderByDesc('pelanggaran_count')
        ->limit(5)
        ->get();

    $topPrestasi = Siswa::withCount([
            'prestasi as prestasi_count' => fn ($q) =>
                $q->where('status', 'diterima')
        ])
        ->orderByDesc('prestasi_count')
        ->limit(5)
        ->get();


    /* =======================
     * TOTAL USER
     * ======================= */
    $totalBK        = User::where('role', 'bk')->count();
    $totalWaliKelas = User::where('role', 'wali_kelas')->count();
    $totalPetugas   = User::where('role', 'petugas')->count();


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

        /*
        |--------------------------------------------------------------------------
        | CARD STATISTIK
        |--------------------------------------------------------------------------
        */

        // Total siswa
        'totalSiswa' => Siswa::count(),

        // ✅ TOTAL DITERIMA (TERVERIFIKASI)
        'totalPelanggaran' => Pelanggaran::where('status', 'diterima')->count(),
        'totalPrestasi'    => Prestasi::where('status', 'diterima')->count(),

        // ⏳ TOTAL PENDING (UNTUK CARD)
        'pending' => 
            Pelanggaran::where('status', 'pending')->count()
            + Prestasi::where('status', 'pending')->count(),


        /*
        |--------------------------------------------------------------------------
        | DATA PENDING (UNTUK LIST)
        |--------------------------------------------------------------------------
        */

        // Pelanggaran pending
        'pelanggaranPending' => Pelanggaran::with([
                'siswa',
                'jenisPelanggaran'
            ])
            ->where('status', 'pending')
            ->latest()
            ->get(),

        // Prestasi pending
        'prestasiPending' => Prestasi::with([
                'siswa',
                'jenis'
            ])
            ->where('status', 'pending')
            ->latest()
            ->get(),


        /*
        |--------------------------------------------------------------------------
        | DATA TERVERIFIKASI (RIWAYAT)
        |--------------------------------------------------------------------------
        */

        // Pelanggaran diterima
        'pelanggaranTerbaru' => Pelanggaran::with([
                'siswa',
                'jenisPelanggaran'
            ])
            ->where('status', 'diterima')
            ->latest()
            ->limit(5)
            ->get(),

        // Prestasi diterima
        'prestasiTerbaru' => Prestasi::with([
                'siswa',
                'jenis'
            ])
            ->where('status', 'diterima')
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
            
            'pelanggaranHariIni' => Pelanggaran::where('petugas_id', $petugasId)
            ->whereDate('created_at', Carbon::today())
            ->count(),
        
        'prestasiHariIni' => Prestasi::where('petugas_id', $petugasId)
            ->whereDate('created_at', Carbon::today())
            ->count(),
        
            
            // Total Input yang dibuat oleh petugas yang sedang login
            'totalInputSaya' =>
            Pelanggaran::where('petugas_id', $petugasId)->count()
            +
            Prestasi::where('petugas_id', $petugasId)->count(),
    

            
            // Pelanggaran Terbaru (5 data terakhir dengan relasi siswa dan jenis pelanggaran)
            'pelanggaranTerbaru' => Pelanggaran::with(['siswa.kelas', 'jenispelanggaran'])
            ->where('petugas_id', $petugasId)
            ->latest()
            ->limit(5)
            ->get(),
        
            
            // Prestasi Terbaru (5 data terakhir dengan relasi siswa dan jenis prestasi)
            'prestasiTerbaru' => Prestasi::with(['siswa.kelas', 'jenis'])
    ->where('petugas_id', $petugasId)
    ->latest()
    ->limit(5)
    ->get(),

        ]);
    }

    public function wali_kelas()
{
    $user = Auth::user();
    $waliKelas = $user->waliKelas;

    if (!$waliKelas || !$waliKelas->kelas_id) {
        abort(403, 'Anda belum memiliki kelas');
    }

    $kelasId = $waliKelas->kelas_id;

    $kelas = Kelas::find($kelasId);
    $kelasName = $kelas ? $kelas->nama_kelas : '-';

    /* =======================
     * STATISTIK UTAMA
     * ======================= */
    $totalSiswa = Siswa::where('kelas_id', $kelasId)->count();

    $totalPelanggaran = Pelanggaran::where('status', 'diterima')
        ->whereHas('siswa', fn ($q) => $q->where('kelas_id', $kelasId))
        ->count();

    $totalPrestasi = Prestasi::where('status', 'diterima')
        ->whereHas('siswa', fn ($q) => $q->where('kelas_id', $kelasId))
        ->count();

    $totalPoin = Siswa::where('kelas_id', $kelasId)->sum('poin');

    /* =======================
     * DATA TERBARU (LIMIT 5)
     * ======================= */
    $pelanggaranTerbaru = Pelanggaran::with(['siswa', 'jenisPelanggaran'])
        ->where('status', 'diterima')
        ->whereHas('siswa', fn ($q) => $q->where('kelas_id', $kelasId))
        ->latest()
        ->take(5)
        ->get();

    $prestasiTerbaru = Prestasi::with(['siswa', 'jenis'])
        ->where('status', 'diterima')
        ->whereHas('siswa', fn ($q) => $q->where('kelas_id', $kelasId))
        ->latest()
        ->take(5)
        ->get();

    /* =======================
     * TOP SISWA
     * ======================= */
    $topPelanggaran = Siswa::where('kelas_id', $kelasId)
        ->withCount([
            'pelanggaran as pelanggaran_count' => function ($q) {
                $q->where('status', 'diterima');
            }
        ])
        ->orderByDesc('pelanggaran_count')
        ->take(5)
        ->get();

    $topPrestasi = Siswa::where('kelas_id', $kelasId)
        ->withCount([
            'prestasi as prestasi_count' => function ($q) {
                $q->where('status', 'diterima');
            }
        ])
        ->orderByDesc('prestasi_count')
        ->take(5)
        ->get();

    return view('dashboard.wali_kelas.dashboard', compact(
        'kelasName',
        'totalSiswa',
        'totalPelanggaran',
        'totalPrestasi',
        'totalPoin',
        'pelanggaranTerbaru',
        'prestasiTerbaru',
        'topPelanggaran',
        'topPrestasi'
    ));
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
    
    // AMBIL DATA RIWAYAT TERBARU
    $prestasiTerbaru = Prestasi::where('siswa_id', $siswa->id)
        ->where('status', 'diterima')
        ->with('jenis')
        ->orderBy('verified_at', 'desc')
        ->limit(3)
        ->get()
        ->map(function ($item) {
            return [
                'type' => 'prestasi',
                'title' => $item->jenis->nama,
                'description' => $item->keterangan ?? 'Prestasi yang telah dicapai',
                'points' => '+' . $item->jenis->poin . ' poin',
                'date' => $item->verified_at ? \Carbon\Carbon::parse($item->verified_at)->format('d M Y') : '',
                'id' => $item->id
            ];
        });
    
    $pelanggaranTerbaru = Pelanggaran::where('siswa_id', $siswa->id)
        ->where('status', 'diterima')
        ->with('jenisPelanggaran')
        ->orderBy('verified_at', 'desc')
        ->limit(3)
        ->get()
        ->map(function ($item) {
            return [
                'type' => 'pelanggaran',
                'title' => $item->jenisPelanggaran->nama,
                'description' => $item->keterangan ?? 'Pelanggaran yang telah dilakukan',
                'points' => '-' . $item->jenisPelanggaran->poin . ' poin',
                'date' => $item->verified_at ? \Carbon\Carbon::parse($item->verified_at)->format('d M Y') : '',
                'id' => $item->id
            ];
        });
    
    // Gabungkan dan urutkan riwayat berdasarkan tanggal
    $riwayatTerbaru = $prestasiTerbaru->concat($pelanggaranTerbaru)
    ->sortByDesc('date')
    ->take(5)
    ->values(); // Akan menghasilkan collection kosong []

    return view('dashboard.siswa.dashboard', compact(
        'totalPrestasi',
        'totalPelanggaran',
        'totalPoin',
        'riwayatTerbaru'
    ));
}

}
