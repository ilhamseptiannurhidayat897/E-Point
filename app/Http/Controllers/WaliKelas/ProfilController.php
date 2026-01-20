<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $walikelas = WaliKelas::with('kelas')
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('dashboard.wali_kelas.profil.index', compact('walikelas'));
    }

    public function edit()
    {
        $walikelas = WaliKelas::where('user_id', Auth::id())
            ->firstOrFail();

        return view('dashboard.wali_kelas.profil.edit', compact('walikelas'));
    }

    public function update(Request $request)
    {
        $walikelas = WaliKelas::where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'current_password' => 'nullable|required_with:password',
            'password' => 'nullable|min:6|confirmed',
        ]);

        if ($request->filled('password')) {

            if (!Hash::check($request->current_password, Auth::user()->password)) {
                return back()->withErrors([
                    'current_password' => 'Password lama salah'
                ]);
            }

            Auth::user()->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()
            ->route('wali_kelas.profil')
            ->with('success', 'Profil berhasil diperbarui');
    }
}
