<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function petugas()
    {
        return view('dashboard.petugas.dashboard');
    }

    public function siswa()
    {
        return view('dashboard.siswa.main');
    }

    public function guru()
    {
        return view('dashboard.guru.dashboard');
    }
}
