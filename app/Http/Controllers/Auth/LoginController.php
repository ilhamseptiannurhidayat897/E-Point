<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nis' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // Cari user berdasarkan NIS, NIP, atau ID Petugas
        $user = User::where('nis', $request->nis)
                    ->orWhere('nip', $request->nis)
                    ->orWhere('id_petugas', $request->nis)
                    ->first();

        // Jika user ditemukan dan password cocok
        if ($user && Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            if ($user->role === 'petugas') {
                return redirect()->intended('/petugas/dashboard');
            } elseif ($user->role === 'guru') {
                return redirect()->intended('/guru/dashboard');
            } elseif ($user->role === 'siswa') {
                return redirect()->intended('/siswa/dashboard');
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'nis' => 'NIS/NIP/ID Petugas atau password salah.',
        ])->onlyInput('nis');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}
