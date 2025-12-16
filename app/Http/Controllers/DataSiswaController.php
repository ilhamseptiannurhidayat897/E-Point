<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataSiswaController extends Controller
{
    public function index()
    {
        return view('dashboard.guru.datasiswa.index', [
            'siswa' => Siswa::latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.guru.datasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis'   => 'required|unique:siswa,nis',
            'nama'  => 'required',
            'jk'    => 'required|in:L,P',
            'kelas' => 'required',
        ]);

        Siswa::create([
            'user_id' => Auth::id(),
            'nis'     => $request->nis,
            'nama'    => $request->nama,
            'jk'      => $request->jk,
            'kelas'   => $request->kelas,
            'alamat'  => $request->alamat,
        ]);

        return redirect()->route('datasiswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('dashboard.guru.datasiswa.edit', [
            'siswa' => Siswa::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis'   => 'required|unique:siswa,nis,' . $siswa->id,
            'nama'  => 'required',
            'jk'    => 'required|in:L,P',
            'kelas' => 'required',
        ]);

        $siswa->update($request->only([
            'nis', 'nama', 'jk', 'kelas', 'alamat'
        ]));

        return redirect()->route('datasiswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();
        return back()->with('success', 'Data siswa dihapus');
    }
}
