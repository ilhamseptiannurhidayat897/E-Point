<?php

namespace App\Http\Controllers;

use App\Models\Kebaikan;
use App\Models\Siswa;
use App\Models\JenisKebaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KebaikanController extends Controller
{
    public function create()
    {
        $siswa = Siswa::orderBy('nama')->get();
        $jenisKebaikan = JenisKebaikan::orderBy('nama')->get();

        return view('dashboard.petugas.inputkebaikan.create', compact('siswa', 'jenisKebaikan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_kebaikan_id' => 'required|exists:jenis_kebaikan,id',
            'keterangan' => 'required',
            'tanggal' => 'required|date',
        ]);

        $jenis = JenisKebaikan::findOrFail($request->jenis_kebaikan_id);

        Kebaikan::create([
            'siswa_id' => $request->siswa_id,
            'jenis_kebaikan_id' => $request->jenis_kebaikan_id,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'poin' => $jenis->poin, // otomatis ambil poin
            'petugas_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard.petugas')
            ->with('success', 'Data kebaikan berhasil ditambahkan');
    }
}
