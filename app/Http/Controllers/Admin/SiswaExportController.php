<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaExportController extends Controller
{
    public function export()
    {
        return Excel::download(
            new SiswaExport,
            'data_siswa.xlsx'
        );
    }
}
