<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\JenisPelanggaranImport;
use Maatwebsite\Excel\Facades\Excel;

class JenisPelanggaranImportController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.jenispelanggaran.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new JenisPelanggaranImport, $request->file('file'));

        return back()->with('success', 'Jenis pelanggaran berhasil diimport');
    }
}
