<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputPelanggaranController extends Controller
{
    /**
     * RIWAYAT pelanggaran petugas
     */
    public function index()
    {
        $pelanggaran = Pelanggaran::with(['siswa','jenisPelanggaran'])
            ->where('petugas_id', Auth::user()->petugas->id)
            ->latest()
            ->get();

        return view('dashboard.petugas.pelanggaran.index', compact('pelanggaran'));
    }

    /**
     * FORM input pelanggaran
     */
    public function create()
    {
        $siswa = Siswa::orderBy('nama')->get();
        $jenis = JenisPelanggaran::orderBy('nama')->get();

        return view('dashboard.petugas.pelanggaran.create', compact('siswa','jenis'));
    }

    /**
     * SIMPAN pelanggaran
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_pelanggaran_id' => 'required|exists:jenis_pelanggaran,id',
            'keterangan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],[
            'siswa_id.required' => 'Siswa wajib dipilih',
            'jenis_pelanggaran_id.required' => 'Jenis pelanggaran wajib dipilih',
            'foto.image' => 'File harus berupa gambar',
            'foto.max' => 'Ukuran foto maksimal 2MB'
        ]);
        

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('pelanggaran', 'public');
        }

        Pelanggaran::create([
            'siswa_id' => $request->siswa_id,
            'jenis_pelanggaran_id' => $request->jenis_pelanggaran_id,
            'petugas_id' => Auth::user()->petugas->id, // 🔥 FIX UTAMA
            'admin_id' => null,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'status' => 'pending'
        ]);

        return redirect()
            ->route('petugas.pelanggaran')
            ->with('success', 'Pelanggaran berhasil dikirim');
    }
}
