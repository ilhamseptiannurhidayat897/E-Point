<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;

        $data = Prestasi::with('jenis')
            ->where('siswa_id', $siswa->id)
            ->where('status', 'diterima')
            ->latest()
            ->get();

        return view('dashboard.siswa.prestasi.index', compact('data'));
    }
}
