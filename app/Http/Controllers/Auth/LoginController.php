<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nis' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba login dengan field 'nis' sebagai username
        if (Auth::attempt(['nis' => $credentials['nis'], 'password' => $credentials['password']], $request->filled('remember'))) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            // Redirect berdasarkan role
            switch($user->role) {
                case 'petugas':
                    return redirect()->intended(route('dashboard'));
                case 'guru':
                    return redirect()->intended(route('dashboard.guru.dashboard'));
                case 'siswa':
                    return redirect()->intended(route('dashboard.siswa'));
                default:
                    Auth::logout();
                    return back()->withErrors([
                        'nis' => 'Role tidak dikenali.',
                    ]);
            }
        }

        return back()->withErrors([
            'nis' => 'NIS atau password salah.',
        ])->withInput($request->only('nis', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing')
        ->with('success', 'Berhasil logout');
    }
}