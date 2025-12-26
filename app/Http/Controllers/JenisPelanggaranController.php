<?php

namespace App\Http\Controllers;

use App\Models\JenisPelanggaran;
use Illuminate\Http\Request;

class JenisPelanggaranController extends Controller
{
    public function index()
    {
        return view('dashboard.petugas.pelanggaran.index', [
            'pelanggaran' => JenisPelanggaran::orderBy('nama')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.petugas.pelanggaran.create_master');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'poin' => 'required|integer|min:1',
        ]);

        JenisPelanggaran::create($request->only('nama','poin'));

        return redirect()->route('pelanggaran.index')
            ->with('success', 'Data pelanggaran berhasil ditambahkan');
    }

    public function edit(JenisPelanggaran $pelanggaran)
    {
        return view('dashboard.petugas.pelanggaran.edit', compact('pelanggaran'));
    }

    public function update(Request $request, JenisPelanggaran $pelanggaran)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'poin' => 'required|integer|min:1',
        ]);

        $pelanggaran->update($request->only('nama','poin'));

        return redirect()->route('pelanggaran.index')
            ->with('success', 'Data pelanggaran berhasil diperbarui');
    }

    public function destroy(JenisPelanggaran $pelanggaran)
    {
        $pelanggaran->delete();

        return redirect()->route('pelanggaran.index')
            ->with('success', 'Data pelanggaran berhasil dihapus');
    }
}
