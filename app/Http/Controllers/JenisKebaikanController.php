<?php

namespace App\Http\Controllers;

use App\Models\JenisKebaikan;
use Illuminate\Http\Request;

class JenisKebaikanController extends Controller
{
    public function index()
    {
        return view('dashboard.petugas.kebaikan.index', [
            'kebaikan' => JenisKebaikan::orderBy('nama')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.petugas.kebaikan.create_master');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'poin' => 'required|integer|min:1',
        ]);

        JenisKebaikan::create($request->only('nama','poin'));

        return redirect()->route('kebaikan.index')
            ->with('success', 'Data kebaikan berhasil ditambahkan');
    }

    public function edit(JenisKebaikan $kebaikan)
    {
        return view('dashboard.petugas.kebaikan.edit', compact('kebaikan'));
    }

    public function update(Request $request, JenisKebaikan $kebaikan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'poin' => 'required|integer|min:1',
        ]);

        $kebaikan->update($request->only('nama','poin'));

        return redirect()->route('kebaikan.index')
            ->with('success', 'Data kebaikan berhasil diperbarui');
    }

    public function destroy(JenisKebaikan $kebaikan)
    {
        $kebaikan->delete();

        return redirect()->route('kebaikan.index')
            ->with('success', 'Data kebaikan berhasil dihapus');
    }
}
