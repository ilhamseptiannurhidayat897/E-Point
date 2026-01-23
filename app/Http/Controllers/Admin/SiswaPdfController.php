<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaPdfController extends Controller
{
    public function export()
    {
        $siswa = Siswa::with('kelas')
            ->orderBy('kelas_id')
            ->orderBy('nama')
            ->get();

        $pdf = Pdf::loadView(
            'dashboard.admin.datasiswa.pdf',
            compact('siswa')
        )->setPaper('A4', 'portrait');

        return $pdf->download('data_siswa.pdf');
    }
}
