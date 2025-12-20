<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
            'nis'   => 'required|unique:siswa,nis|unique:users,login_id',
            'nama'  => 'required',
            'jk'    => 'required|in:L,P',
            'kelas' => 'required',
        ]);

        DB::transaction(function () use ($request) {

            // BUAT AKUN SISWA
            $user = User::create([
                'login_id' => $request->nis,
                'password' => Hash::make('12345678'),
                'role'     => 'siswa',
            ]);

            // SIMPAN DATA SISWA
            Siswa::create([
                'user_id' => $user->id,
                'nis'     => $request->nis,
                'nama'    => $request->nama,
                'jk'      => $request->jk,
                'kelas'   => $request->kelas,
                'alamat'  => $request->alamat,
            ]);
        });

        return redirect()->route('datasiswa.index')
            ->with('success', 'Siswa berhasil ditambahkan (Password: 12345678)');
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
