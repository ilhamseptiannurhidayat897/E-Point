<?php

namespace App\Http\Controllers;

use App\Models\JenisPrestasi;
use Illuminate\Http\Request;

class JenisPrestasiController extends Controller
{
    public function index()
    {
        $prestasi = JenisPrestasi::orderBy('nama')->get();
        return view('dashboard.admin.jenisprestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('dashboard.admin.jenisprestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'poin' => 'required|integer|min:1',
        ]);

        JenisPrestasi::create($request->all());

        return redirect()
            ->route('jenisprestasi.index')
            ->with('success', 'Jenis prestasi berhasil ditambahkan');
    }

    public function edit(JenisPrestasi $jenisprestasi)
    {
        return view('dashboard.admin.jenisprestasi.edit', compact('jenisprestasi'));
    }

    public function update(Request $request, JenisPrestasi $jenisprestasi)
    {
        $request->validate([
            'nama' => 'required',
            'poin' => 'required|integer|min:1',
        ]);

        $jenisprestasi->update($request->all());

        return redirect()
            ->route('jenisprestasi.index')
            ->with('success', 'Jenis prestasi berhasil diperbarui');
    }

    public function destroy(JenisPrestasi $jenisprestasi)
    {
        $jenisprestasi->delete();

        return back()->with('success', 'Jenis prestasi berhasil dihapus');
    }
}
