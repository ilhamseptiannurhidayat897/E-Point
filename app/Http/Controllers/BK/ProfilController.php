<?php

namespace App\Http\Controllers\BK;

use App\Http\Controllers\Controller;
use App\Models\BK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $bk = BK::where('user_id', Auth::id())
            ->firstOrFail();

        return view('dashboard.bk.profil.index', compact('bk'));
    }

    public function edit()
    {
        $bk = BK::where('user_id', Auth::id())
            ->firstOrFail();

        return view('dashboard.bk.profil.edit', compact('bk'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'nullable|required_with:password',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // ganti password jika diisi
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
            ->route('bk.profil')
            ->with('success', 'Password berhasil diperbarui');
    }
}
