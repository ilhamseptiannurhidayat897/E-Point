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
        $query = Pelanggaran::with([
            'siswa','jenis','admin','petugas','verifikator'
        ]);

        // Petugas hanya lihat laporan sendiri
        if (Auth::user()->role === 'petugas') {
            $query->where('petugas_id', Auth::id());
        }

        $pelanggaran = $query->latest()->get();

        return view('dashboard.admin.pelanggaran.index', compact('pelanggaran'));
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama')->get();
        $jenis = JenisPelanggaran::orderBy('nama')->get();

        return view('dashboard.admin.pelanggaran.create', compact('siswa','jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'jenis_pelanggaran_id' => 'required',
            'foto' => 'nullable|image|max:2048'
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('pelanggaran','public');
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
            ->with('success','Laporan berhasil dikirim');
    }

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

        return back()->with('success','Pelanggaran berhasil diverifikasi');
    }
}
