<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        
        if (!in_array($user->role, $roles)) {
            // Redirect ke dashboard yang sesuai dengan role user
            switch($user->role) {
                case 'petugas':
                    return redirect()->route('dashboard.petugas');
                case 'guru':
                    return redirect()->route('dashboard.guru');
                case 'siswa':
                    return redirect()->route('dashboard.siswa');
                default:
                    return redirect('/');
            }
        }

        return $next($request);
    }
}