<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login_id' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt([
            'login_id' => $credentials['login_id'],
            'password' => $credentials['password'],
        ], $request->filled('remember'))) {

            $request->session()->regenerate();
            $user = Auth::user();

            switch ($user->role) {
                case 'petugas':
                    return redirect()->route('dashboard.petugas');

                case 'guru':
                    return redirect()->route('dashboard.guru');

                case 'siswa':
                    return redirect()->route('dashboard.siswa');

                default:
                    Auth::logout();
                    return back()->withErrors([
                        'login_id' => 'Role tidak dikenali',
                    ]);
            }
        }

        return back()->withErrors([
            'login_id' => 'Login ID atau password salah',
        ])->withInput($request->only('login_id', 'remember'));
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
