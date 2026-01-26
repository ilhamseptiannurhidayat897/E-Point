<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;

        $data = Prestasi::with('jenis')
            ->where('siswa_id', $siswa->id)
            ->where('status', 'diterima')
            ->latest()
            ->paginate(10);

        // Hitung statistik
        $totalPoinPrestasi = 0;
        $rataRataPoin = 0;
        
        if ($data->count() > 0) {
            $totalPoinPrestasi = $data->sum(fn($item) => $item->jenis->poin ?? 0);
            $rataRataPoin = number_format($data->avg(fn($item) => $item->jenis->poin ?? 0), 1);
        }

        return view('dashboard.siswa.prestasi.index', [
            'data' => $data,
            'totalPoinPrestasi' => $totalPoinPrestasi,
            'rataRataPoin' => $rataRataPoin,
        ]);
    }
}