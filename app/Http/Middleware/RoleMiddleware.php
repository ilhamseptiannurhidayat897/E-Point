<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Jika belum login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Jika role tidak diizinkan
        if (!in_array($user->role, $roles)) {

            return match ($user->role) {
                'admin'      => redirect()->route('dashboard.admin'),
                'bk'         => redirect()->route('dashboard.bk'),
                'wali_kelas' => redirect()->route('dashboard.wali_kelas'),
                'petugas'    => redirect()->route('dashboard.petugas'),
                'siswa'      => redirect()->route('dashboard.siswa'),
                default      => redirect('/'),
            };
        }

        return $next($request);
    }
}
