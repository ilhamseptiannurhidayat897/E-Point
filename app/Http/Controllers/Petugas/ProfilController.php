<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $petugas = Petugas::where('user_id', $user->id)->firstOrFail();

        return view('dashboard.petugas.profil.index', compact('petugas'));
    }

    public function edit()
    {
        return view('dashboard.petugas.profil.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->password_lama, Auth::user()->password)) {
            return back()->withErrors([
                'password_lama' => 'Password lama salah'
            ]);
        }

        Auth::user()->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect()
            ->route('petugas.profil.index')
            ->with('success', 'Password berhasil diperbarui');
    }
}

