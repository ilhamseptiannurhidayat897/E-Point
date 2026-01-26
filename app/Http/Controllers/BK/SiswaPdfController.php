<?php

namespace App\Http\Controllers\BK;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaPdfController extends Controller
{
    public function export()
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300);

        // 🔴 ambil kelas dari request (WAJIB)
        $kelasId = request('kelas_id');

        if (!$kelasId) {
            abort(404, 'Kelas belum dipilih');
        }

        $siswa = Siswa::with('kelas')
            ->withCount([
                'pelanggaran as jumlah_pelanggaran',
                'prestasi as jumlah_prestasi'
            ])
            ->where('kelas_id', $kelasId) // 🔥 PER KELAS
            ->orderBy('nama')
            ->get()
            ->map(function ($s) {
                return [
                    'nama'        => $s->nama,
                    'nis'         => $s->nis,
                    'kelas'       => $s->kelas->nama_kelas ?? '-',
                    'poin'        => $s->poin ?? 0,
                    'pelanggaran' => $s->jumlah_pelanggaran,
                    'prestasi'    => $s->jumlah_prestasi,
                ];
            })
            ->values();

        // 🔴 ambil nama kelas untuk judul PDF
        $kelasNama = $siswa->first()['kelas'] ?? 'Kelas';

        $pdf = Pdf::loadView(
            'dashboard.bk.siswa.pdf',
            compact('siswa', 'kelasNama')
        )->setPaper('A4', 'landscape');

        return $pdf->download(
            'rekap-siswa-bk-' . str_replace(' ', '-', strtolower($kelasNama)) . '.pdf'
        );
    }
}
