<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\JenisPrestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{
    public function index()
    {
        $query = Prestasi::with([
            'siswa',
            'jenis',
            'admin',
            'petugas',
            'verifikator'
        ]);
    
        // Petugas hanya lihat data sendiri
        if (Auth::user()->role === 'petugas') {
            $query->where('petugas_id', Auth::user()->petugas->id);
        }
    
        $prestasi = $query->latest()->get();
    
        return view('dashboard.admin.prestasi.index', compact('prestasi'));
    }
    

    public function create()
    {
        $siswa = Siswa::orderBy('nama')->get();
        $jenis = JenisPrestasi::orderBy('nama')->get();

        return view('dashboard.admin.prestasi.create', compact('siswa','jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'jenis_prestasi_id' => 'required',
            'foto' => 'nullable|image|max:2048'
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('prestasi','public');
        }

        Prestasi::create([
            'siswa_id' => $request->siswa_id,
            'jenis_prestasi_id' => $request->jenis_prestasi_id,
            'admin_id' => Auth::user()->role === 'admin' ? Auth::id() : null,
            'petugas_id' => Auth::user()->role === 'petugas'
                ? Auth::user()->petugas->id
                : null,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'status' => 'pending'
        ]);
        

        return redirect()->route('prestasi.index')
            ->with('success','Prestasi berhasil ditambahkan');
    }

    public function verifikasi(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak'
        ]);

        $prestasi->update([
            'status' => $request->status,
            'verified_by' => Auth::id(),
            'verified_at' => now()
        ]);

        return back()->with('success','Prestasi berhasil diverifikasi');
    }
}
