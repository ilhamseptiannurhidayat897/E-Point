<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelanggaranController extends Controller
{
    /**
     * Tampilkan form input pelanggaran siswa
     */
    public function create()
    {
        $siswa = Siswa::orderBy('nama')->get();
        $jenisPelanggaran = JenisPelanggaran::orderBy('nama')->get();

        return view('dashboard.petugas.inputpelanggaran.create', [
            'siswa' => $siswa,
            'jenisPelanggaran' => $jenisPelanggaran,
        ]);
    }

    /**
     * Simpan data pelanggaran siswa
     */
    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_pelanggaran_id' => 'required|exists:jenis_pelanggaran,id',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // ambil jenis pelanggaran (poin NEGATIF)
        $jenis = JenisPelanggaran::findOrFail($request->jenis_pelanggaran_id);

        // simpan
        Pelanggaran::create([
            'siswa_id' => $request->siswa_id,
            'jenis_pelanggaran_id' => $request->jenis_pelanggaran_id,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'poin' => $jenis->poin, // poin negatif
            'petugas_id' => Auth::id(),
        ]);

        return redirect()
            ->route('dashboard.petugas')
            ->with('success', 'Data pelanggaran berhasil ditambahkan');
    }

}
