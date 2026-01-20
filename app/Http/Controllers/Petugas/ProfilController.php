<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
            if(!auth()->user()->hasRole('petugas')){
        abort(403);
    }

        return view('dashboard.petugas.profil.index');
    }

    public function edit()
    {
        return view('dashboard.petugas.profil.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama salah'
            ]);
        }

        Auth::user()->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('petugas.profil')
            ->with('success', 'Password berhasil diperbarui');
    }
}
