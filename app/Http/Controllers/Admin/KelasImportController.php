<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\KelasImport;
use Maatwebsite\Excel\Facades\Excel;

class KelasImportController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.datakelas.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new KelasImport, $request->file('file'));

        return back()->with('success', 'Data kelas berhasil diimport');
    }
}
