<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WaliKelas;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WaliKelasController extends Controller
{
    /**
     * INDEX
     */
    public function index()
    {
        return view('dashboard.admin.walikelas.index', [
            'walikelas' => WaliKelas::with('kelas')->latest()->get()
        ]);
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('dashboard.admin.walikelas.create', [
            'kelas' => Kelas::orderBy('nama_kelas')->get()
        ]);
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip'      => 'required|unique:wali_kelas,nip|unique:users,login_id',
            'nama'     => 'required',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        DB::transaction(function () use ($request) {

            // BUAT AKUN USER
            $user = User::create([
                'login_id' => $request->nip,
                'password' => Hash::make('12345678'),
                'role'     => 'wali_kelas',
            ]);

            // BUAT DATA WALI KELAS
            WaliKelas::create([
                'user_id'  => $user->id,
                'nip'      => $request->nip,
                'nama'     => $request->nama,
                'kelas_id' => $request->kelas_id,
            ]);
        });

        return redirect()->route('walikelas.index')
            ->with('success', 'Wali Kelas berhasil ditambahkan (Password: 12345678)');
    }

    /**
     * EDIT
     */
    public function edit(WaliKelas $walikelas)
    {
        return view('dashboard.admin.walikelas.edit', [
            'walikelas' => $walikelas,
            'kelas'     => Kelas::orderBy('nama_kelas')->get()
        ]);
    }

    /**
     * UPDATE
     */
    public function update(Request $request, WaliKelas $walikelas)
    {
        $request->validate([
            'nip'      => 'required|unique:wali_kelas,nip,' . $walikelas->id,
            'nama'     => 'required',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        DB::transaction(function () use ($request, $walikelas) {

            // UPDATE USER LOGIN_ID JIKA NIP BERUBAH
            $walikelas->user->update([
                'login_id' => $request->nip,
            ]);

            // UPDATE DATA WALI KELAS
            $walikelas->update([
                'nip'      => $request->nip,
                'nama'     => $request->nama,
                'kelas_id' => $request->kelas_id,
            ]);
        });

        return redirect()->route('walikelas.index')
            ->with('success', 'Data Wali Kelas berhasil diperbarui');
    }

    /**
     * DELETE
     */
    public function destroy(WaliKelas $walikelas)
    {
        DB::transaction(function () use ($walikelas) {
            // hapus user otomatis
            $walikelas->user->delete();
            $walikelas->delete();
        });

        return back()->with('success', 'Data Wali Kelas berhasil dihapus');
    }
}
