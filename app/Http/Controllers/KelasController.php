<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.datakelas.index', [
            'kelas' => Kelas::orderBy('tingkat')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.datakelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tingkat' => 'required',
            'jurusan' => 'required',
            'nomor'   => 'required|numeric'
        ]);

        // khusus PPLG wajib konsentrasi
        if ($request->jurusan === 'PPLG' && !$request->konsentrasi) {
            return back()->withErrors(['konsentrasi'=>'PPLG wajib pilih konsentrasi']);
        }

        $nama = $request->tingkat.' '.$request->jurusan;

        if ($request->jurusan === 'PPLG') {
            $nama .= ' '.$request->konsentrasi;
        }

        $nama .= ' '.$request->nomor;

        Kelas::create([
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'konsentrasi' => $request->jurusan === 'PPLG' ? $request->konsentrasi : null,
            'nomor' => $request->nomor,
            'nama_kelas' => $nama
        ]);

        return redirect()->route('datakelas.index')->with('success','Kelas berhasil ditambahkan');
    }

    public function edit(Kelas $kelas)
    {
        return view('dashboard.admin.datakelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'tingkat' => 'required',
            'jurusan' => 'required',
            'nomor'   => 'required|numeric'
        ]);

        if ($request->jurusan === 'PPLG' && !$request->konsentrasi) {
            return back()->withErrors(['konsentrasi'=>'PPLG wajib pilih konsentrasi']);
        }

        $nama = $request->tingkat.' '.$request->jurusan;

        if ($request->jurusan === 'PPLG') {
            $nama .= ' '.$request->konsentrasi;
        }

        $nama .= ' '.$request->nomor;

        $kelas->update([
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'konsentrasi' => $request->jurusan === 'PPLG' ? $request->konsentrasi : null,
            'nomor' => $request->nomor,
            'nama_kelas' => $nama
        ]);

        return redirect()->route('dashboard.admin.datakelas.index')->with('success','Kelas berhasil diupdate');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return back()->with('success','Kelas dihapus');
    }
}

