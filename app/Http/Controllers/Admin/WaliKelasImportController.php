<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\WaliKelasImport;
use Maatwebsite\Excel\Facades\Excel;

class WaliKelasImportController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.walikelas.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new WaliKelasImport, $request->file('file'));

        return back()->with('success', 'Data wali kelas berhasil diimport');
    }
}
