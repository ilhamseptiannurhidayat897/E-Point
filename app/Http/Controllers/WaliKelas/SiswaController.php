<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\WaliKelas;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Tampilkan daftar siswa kelas yang diampu wali kelas
     */
    public function index()
    {
        // Ambil wali kelas berdasarkan user login
        $waliKelas = WaliKelas::with('kelas.siswa')
            ->where('user_id', Auth::id())
            ->first();

        // Jika wali kelas belum disetting
        if (!$waliKelas || !$waliKelas->kelas) {
            return view('dashboard.wali_kelas.siswa.index', [
                'siswa' => collect(),
                'kelas' => null
            ]);
        }

        return view('dashboard.wali_kelas.siswa.index', [
            'siswa' => $waliKelas->kelas->siswa,
            'kelas' => $waliKelas->kelas
        ]);
    }

    /**
     * Detail siswa (hanya siswa dari kelas wali tsb)
     */
    public function show($id)
    {
        // Ambil wali kelas login
        $waliKelas = WaliKelas::where('user_id', Auth::id())->firstOrFail();

        // Ambil siswa dari kelas wali tsb saja (AMAN)
        $siswa = Siswa::where('id', $id)
            ->where('kelas_id', $waliKelas->kelas_id)
            ->firstOrFail();

        return view('dashboard.wali_kelas.siswa.show', compact('siswa'));
    }
}
