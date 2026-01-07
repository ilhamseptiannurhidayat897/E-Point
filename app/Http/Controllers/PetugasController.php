<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.datapetugas.index', [
            'petugas' => Petugas::latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.datapetugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nk'  => 'required|unique:petugas,nk|unique:users,login_id',
            'nama' => 'required',
        ]);

        DB::transaction(function () use ($request) {

            $user = User::create([
                'login_id' => $request->nk,
                'password' => Hash::make('12345678'),
                'role'     => 'petugas',
            ]);

            Petugas::create([
                'user_id' => $user->id,
                'nk'     => $request->nk,
                'nama'    => $request->nama,
            ]);
        });

        return redirect()->route('datapetugas.index')
            ->with('success', 'Petugas berhasil ditambahkan (Password: 12345678)');
    }

    public function edit($id)
    {
        return view('dashboard.admin.datapetugas.edit', [
            'petugas' => Petugas::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $request->validate([
            'nk'  => 'required|unique:petugas,nk,' . $petugas->id,
            'nama' => 'required',
        ]);

        $petugas->update([
            'nk'  => $request->nk,
            'nama' => $request->nama,
        ]);

        $petugas->user->update([
            'login_id' => $request->nk
        ]);

        return redirect()->route('datapetugas.index')
            ->with('success', 'Data petugas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->user->delete(); // user ikut kehapus
        $petugas->delete();

        return back()->with('success', 'Petugas berhasil dihapus');
    }
}
