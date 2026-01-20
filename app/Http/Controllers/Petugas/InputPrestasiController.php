<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\JenisPrestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputPrestasiController extends Controller
{
    /**
     * Riwayat prestasi milik petugas login
     */
    public function index()
    {
        $prestasi = Prestasi::with(['siswa', 'jenis'])
            ->where('petugas_id', Auth::user()->petugas->id)
            ->latest()
            ->get();
    
        return view('dashboard.petugas.prestasi.index', compact('prestasi'));
    }
    

    /**
     * Form input prestasi
     */
    public function create()
    {
        return view('dashboard.petugas.prestasi.create', [
            'siswa' => Siswa::orderBy('nama')->get(),
            'jenis' => JenisPrestasi::orderBy('nama')->get(),
        ]);
    }

    /**
     * Simpan prestasi
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_prestasi_id' => 'required|exists:jenis_prestasi,id',
            'keterangan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create([
            'siswa_id' => $request->siswa_id,
            'jenis_prestasi_id' => $request->jenis_prestasi_id,
            'petugas_id' => Auth::user()->petugas->id,// ⬅️ WAJIB
            'keterangan' => $request->keterangan,
            'status' => 'pending',
        ]);
        return back()->with('success', 'Prestasi berhasil dikirim');
    }
}