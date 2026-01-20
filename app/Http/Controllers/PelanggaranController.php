<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelanggaranController extends Controller
{
public function index()
    {
        $pelanggaran = Pelanggaran::with([
            'siswa',
            'jenisPelanggaran',
            'admin',
            'verifikator'
        ])->latest()->get();

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
