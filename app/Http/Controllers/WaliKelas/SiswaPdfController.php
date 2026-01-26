<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class SiswaPdfController extends Controller
{
    public function export()
    {
        $userId = Auth::id(); // wali kelas (user)

        $siswa = Siswa::whereHas('kelas.waliKelas', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->with('kelas')
            ->withCount([
                'pelanggaran as total_pelanggaran',
                'prestasi as total_prestasi'
            ])
            ->orderBy('nama')
            ->get()
            ->map(function ($s) {
                return [
                    'nama'        => $s->nama,
                    'nis'         => $s->nis,
                    'kelas'       => $s->kelas->nama_kelas ?? '-',
                    'poin'        => $s->poin ?? 0,
                    'pelanggaran' => $s->total_pelanggaran,
                    'prestasi'    => $s->total_prestasi,
                ];
            })
            ->values(); // 🔥 penting biar stabil

        $pdf = Pdf::loadView(
            'dashboard.wali_kelas.siswa.pdf',
            compact('siswa')
        )->setPaper('A4', 'landscape');

        return $pdf->download('rekap-siswa-wali-kelas.pdf');
    }
}
