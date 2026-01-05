<?php

namespace App\Http\Controllers;

use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;

class JenisPelanggaranController extends Controller
{
    public function index()
    {
        $pelanggaran = JenisPelanggaran::orderBy('nama')->get();
        return view('dashboard.admin.jenispelanggaran.index', compact('pelanggaran'));
    }

    public function create()
    {
        return view('dashboard.admin.jenispelanggaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'poin' => 'required|integer|min:1',
        ]);

        JenisPelanggaran::create($request->all());

        return redirect()
            ->route('jenispelanggaran.index')
            ->with('success', 'Jenis pelanggaran berhasil ditambahkan');
    }

    public function edit(JenisPelanggaran $jenispelanggaran)
    {
        return view('dashboard.admin.jenispelanggaran.edit', compact('jenispelanggaran'));
    }

    public function update(Request $request, JenisPelanggaran $jenispelanggaran)
    {
        $request->validate([
            'nama' => 'required',
            'poin' => 'required|integer|min:1',
        ]);

        $jenispelanggaran->update($request->all());

        return redirect()
            ->route('jenispelanggaran.index')
            ->with('success', 'Jenis pelanggaran berhasil diperbarui');
    }

    public function destroy(JenisPelanggaran $jenispelanggaran)
    {
        $jenispelanggaran->delete();

        return back()->with('success', 'Jenis pelanggaran berhasil dihapus');
    }
}
