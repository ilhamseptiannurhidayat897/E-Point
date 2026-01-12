<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('dashboard.siswa.profil.index', compact('siswa'));
    }

    public function edit()
    {
        $siswa = Siswa::where('user_id', Auth::id())
            ->firstOrFail();

        return view('dashboard.siswa.profil.edit', compact('siswa'));
    }

    public function update(Request $request)
    {
        $siswa = Siswa::where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'alamat' => 'nullable|string',
        ]);

        $siswa->update([
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('siswa.profil')
            ->with('success', 'Profil berhasil diperbarui');
    }
}
