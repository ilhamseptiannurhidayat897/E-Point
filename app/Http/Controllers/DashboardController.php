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
        return view('dashboard.petugas.main');
    }

    public function siswa()
    {
        return view('dashboard.siswa.main');
    }

    public function guru()
    {
        return view('dashboard.guru.dashboard');
    }

    public function riwayatPoin()
    {
        /** @var Student $siswa */
        $siswa = Auth::user(); // IDE friendly

        if (!$siswa) {
            abort(403, "Siswa belum login.");
        }

        $good = GoodPoint::where('student_id', $siswa->id)
            ->select('created_at', 'points as jumlah', 'description as keterangan')
            ->addSelect(DB::raw("'kebaikan' as jenis"));

        $bad = Violation::where('student_id', $siswa->id)
            ->select('created_at', 'points as jumlah', 'description as keterangan')
            ->addSelect(DB::raw("'pelanggaran' as jenis"));

        $riwayat = $good->unionAll($bad)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.siswa.laporan', compact('riwayat'));
    }
}
