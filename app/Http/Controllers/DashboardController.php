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
        return view('dashboard.siswa.dashboard');
    }

    public function wali_kelas()
    {
        return view('dashboard.wali_kelas.dashboard');
    }

    public function admin()
    {
        return view('dashboard.admin.dashboard');
    }

    public function bk()
    {
        return view('dashboard.bk.dashboard');
    }
}
