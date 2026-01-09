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
     * Tampilkan daftar pelanggaran (semua role)
     */
    public function index()
    {
        $query = Pelanggaran::with([
            'siswa',
            'jenisPelanggaran',
            'admin',
            'petugas',
            'verifikator'
        ]);

        $user = Auth::user();

        // Petugas: hanya lihat laporan sendiri
        if ($user->role === 'petugas') {
            $query->where('petugas_id', $user->id);
        }

        // Siswa: hanya lihat data dirinya
        if ($user->role === 'siswa') {
            $query->where('siswa_id', $user->siswa->id ?? 0);
        }

        // Wali kelas: filter kelas (opsional, kalau relasi sudah ada)
        if ($user->role === 'wali_kelas') {
            $query->whereHas('siswa', function ($q) use ($user) {
                $q->where('kelas_id', $user->waliKelas->kelas_id ?? 0);
            });
        }

        $pelanggaran = $query->latest()->get();

        return view('dashboard.admin.pelanggaran.index', compact('pelanggaran'));
    }

    /**
     * Form input pelanggaran
     */
    public function create()
    {
        $siswa = Siswa::orderBy('nama')->get();
        $jenis = JenisPelanggaran::orderBy('nama')->get();

        return view('dashboard.admin.pelanggaran.create', compact('siswa', 'jenis'));
    }

    /**
     * Simpan laporan pelanggaran
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_pelanggaran_id' => 'required|exists:jenis_pelanggaran,id',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('pelanggaran', 'public');
        }

        Pelanggaran::create([
            'siswa_id' => $request->siswa_id,
            'jenis_pelanggaran_id' => $request->jenis_pelanggaran_id,
            'admin_id' => Auth::user()->role === 'admin' ? Auth::id() : null,
            'petugas_id' => Auth::user()->role === 'petugas' ? Auth::id() : null,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'status' => 'pending'
        ]);

        return redirect()->route('pelanggaran.index')
            ->with('success', 'Laporan pelanggaran berhasil dikirim');
    }

    /**
     * Verifikasi pelanggaran (Admin & BK)
     */
    public function verifikasi(Request $request, Pelanggaran $pelanggaran)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak'
        ]);

        $pelanggaran->update([
            'status' => $request->status,
            'verified_by' => Auth::id(),
            'verified_at' => now()
        ]);

        return back()->with('success', 'Pelanggaran berhasil diverifikasi');
    }
}
