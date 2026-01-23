<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\JenisPrestasiImport;
use Maatwebsite\Excel\Facades\Excel;

class JenisPrestasiImportController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.jenisprestasi.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new JenisPrestasiImport, $request->file('file'));

        return back()->with('success', 'Jenis prestasi berhasil diimport');
    }
}
