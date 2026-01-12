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
            'pelanggaran.jenis',
            'prestasi.jenis'
        ])->latest()->get();

        return view('dashboard.bk.siswa.index', compact('siswa'));
    }

    /**
     * Detail siswa
     */
    public function show(Siswa $siswa)
    {
        $siswa->load([
            'kelas.walikelas',
            'pelanggaran.jenis',
            'prestasi.jenis'
        ]);

        return view('dashboard.bk.siswa.show', compact('siswa'));
    }
}
