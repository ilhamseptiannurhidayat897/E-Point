<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Tampilkan semua data siswa
     */
    public function index()
    {
        $siswa = Siswa::with(['kelas.walikelas', 'user'])->get();
        return view('dashboard.admin.datasiswa.index', compact('siswa'));
    }

    /**
     * Form tambah siswa
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('dashboard.admin.datasiswa.create', compact('kelas'));
    }

    /**
     * Simpan data siswa + user
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis|unique:users,login_id',
            'nama' => 'required',
            'jk' => 'required|in:L,P',
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'nullable',
        ]);

        $user = User::create([
            'login_id' => $request->nis,
            'password' => Hash::make($request->nis),
            'role' => 'siswa',
        ]);

        Siswa::create([
            'user_id' => $user->id,
            'kelas_id' => $request->kelas_id,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('datasiswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Form edit siswa
     */
    public function edit(Siswa $datasiswa)
    {
        $kelas = Kelas::all();
        return view('dashboard.admin.datasiswa.edit', compact('datasiswa', 'kelas'));
    }

    /**
     * Update data siswa
     */
    public function update(Request $request, Siswa $datasiswa)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $datasiswa->id,
            'nama' => 'required',
            'jk' => 'required|in:L,P',
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'nullable',
        ]);

        // update siswa
        $datasiswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat,
        ]);

        // update nama user
        $datasiswa->user->update([
            'name' => $request->nama
        ]);

        return redirect()
            ->route('datasiswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    /**
     * Hapus siswa + user
     */
    public function destroy(Siswa $datasiswa)
    {
        $datasiswa->user()->delete();

        return redirect()
            ->route('datasiswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}
