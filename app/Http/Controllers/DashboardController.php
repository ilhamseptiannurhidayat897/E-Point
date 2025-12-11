<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function petugas()
    {
        return view('dashboard.petugas.main');
    }

    public function siswa()
    {
        return view('dashboard.siswa.main');
    }

    public function guru()
    {
        return view('dashboard.guru.main');
    }
}