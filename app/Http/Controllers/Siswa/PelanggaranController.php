<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use Illuminate\Support\Facades\Auth;

class PelanggaranController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;

        $data = Pelanggaran::with('jenisPelanggaran')
            ->where('siswa_id', $siswa->id)
            ->where('status', 'diterima')
            ->latest()
            ->get();

        return view('dashboard.siswa.pelanggaran.index', compact('data'));
    }
}
