<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\GoodPoint;
use App\Models\Violation;
use App\Models\Student;

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
