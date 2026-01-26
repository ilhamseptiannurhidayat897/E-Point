<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use Illuminate\Support\Facades\Auth;

class PelanggaranController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;

        $data = Pelanggaran::with('jenisPelanggaran')
            ->where('siswa_id', $siswa->id)
            ->where('status', 'diterima')
            ->latest()
            ->paginate(10);

        // Hitung statistik
        $totalPoinPelanggaran = 0;
        $rataRataPoin = 0;
        
        if ($data->count() > 0) {
            $totalPoinPelanggaran = abs($data->sum(fn($item) => $item->jenisPelanggaran->poin ?? 0));
            $rataRataPoin = number_format($data->avg(fn($item) => $item->jenisPelanggaran->poin ?? 0), 1);
        }

        return view('dashboard.siswa.pelanggaran.index', [
            'data' => $data,
            'totalPoinPelanggaran' => $totalPoinPelanggaran,
            'rataRataPoin' => $rataRataPoin
        ]);
    }
}