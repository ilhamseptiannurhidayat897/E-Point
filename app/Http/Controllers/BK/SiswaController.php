<?php

namespace App\Http\Controllers\BK;

use App\Http\Controllers\Controller;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * List semua siswa (BK)
     */
    public function index()
    {
        $siswa = Siswa::with([
            'kelas.walikelas',
            'pelanggaran.jenisPelanggaran',
            'prestasi.jenis'
        ])->latest()->paginate(10);
    
        $siswaData = $siswa->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama,
                'nis' => $item->nis,
                'kelas' => $item->kelas->nama_kelas ?? '-',
                'walikelas' => $item->kelas->walikelas->nama ?? '-',
                'pelanggaran' => $item->pelanggaran->map(function ($p) {
                    return [
                        'nama' => $p->jenisPelanggaran->nama ?? '-',
                        'poin' => $p->jenisPelanggaran->poin ?? 0,
                        'status' => $p->status,
                        'tanggal' => $p->created_at->format('d M Y'),
                    ];
                })->values(),
                'prestasi' => $item->prestasi->map(function ($p) {
                    return [
                        'nama' => $p->jenis->nama ?? '-',
                        'poin' => $p->jenis->poin ?? 0,
                        'status' => $p->status,
                        'tanggal' => $p->created_at->format('d M Y'),
                        'foto' => $p->foto,
                    ];
                })->values(),
            ];
        })->keyBy('id');
    
        return view('dashboard.bk.siswa.index', compact('siswa', 'siswaData'));
    }
    
    

    /**
     * Detail siswa
     */
    public function show(Siswa $siswa)
    {
        $siswa->load([
            'kelas.walikelas',
            'pelanggaran.jenisPelanggaran',
            'prestasi.jenis'
        ]);

        return view('dashboard.bk.siswa.show', compact('siswa'));
    }
}
