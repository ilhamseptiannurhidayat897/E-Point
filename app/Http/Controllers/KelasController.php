<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.datakelas.index', [
            'kelas' => Kelas::orderBy('tingkat')->orderBy('jurusan')->orderBy('nomor')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.datakelas.create');
    }

    public function store(Request $request)
    {
        // VALIDASI: 'nomor' sekarang 'nullable' (boleh kosong)
        $validatedData = $request->validate([
            'tingkat' => 'required|string|in:X,XI,XII',
            'jurusan' => 'required|string|in:TO,TJKT,DPIB,MPLB,AKL,SP,RPL,GIM',
            'nomor'   => 'nullable|numeric|min:1' // <-- PERUBAHAN DI SINI
        ]);

        // LOGIKA NAMA KELAS: Periksa apakah nomor ada
        $namaKelas = $validatedData['tingkat'] . ' ' . $validatedData['jurusan'];
        
        // Tambahkan nomor hanya jika diisi
        if (!empty($validatedData['nomor'])) {
            $namaKelas .= ' ' . $validatedData['nomor'];
        }

        Kelas::create([
            'tingkat'    => $validatedData['tingkat'],
            'jurusan'    => $validatedData['jurusan'],
            'nomor'      => $validatedData['nomor'], // Akan null jika tidak diisi
            'nama_kelas' => $namaKelas
        ]);

        return redirect()->route('datakelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit(Kelas $kelas)
    {
        return view('dashboard.admin.datakelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        // VALIDASI: 'nomor' sekarang 'nullable'
        $validatedData = $request->validate([
            'tingkat' => 'required|string|in:X,XI,XII',
            'jurusan' => 'required|string|in:TO,TJKT,DPIB,MPLB,AKL,SP,RPL,GIM',
            'nomor'   => 'nullable|numeric|min:1' // <-- PERUBAHAN DI SINI
        ]);

        // LOGIKA NAMA KELAS: Sama seperti di store
        $namaKelas = $validatedData['tingkat'] . ' ' . $validatedData['jurusan'];
        
        if (!empty($validatedData['nomor'])) {
            $namaKelas .= ' ' . $validatedData['nomor'];
        }

        $kelas->update([
            'tingkat'    => $validatedData['tingkat'],
            'jurusan'    => $validatedData['jurusan'],
            'nomor'      => $validatedData['nomor'],
            'nama_kelas' => $namaKelas
        ]);

        return redirect()->route('datakelas.index')->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('datakelas.index')->with('success', 'Kelas berhasil dihapus');
    }
}