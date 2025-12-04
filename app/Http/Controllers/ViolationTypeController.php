<?php

namespace App\Http\Controllers;

use App\Models\ViolationType;
use Illuminate\Http\Request;

class ViolationTypeController extends Controller
{
    public function index()
    {
        $types = ViolationType::latest()->paginate(10);
        return view('violation_types.index', compact('types'));
    }

    public function create()
    {
        return view('violation_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:violation_types',
            'name' => 'required',
            'points' => 'required|integer',
            'description' => 'nullable'
        ]);

        ViolationType::create($request->all());

        return redirect()->route('violation-types.index')->with('success', 'Jenis pelanggaran berhasil ditambahkan.');
    }

    public function edit(ViolationType $violationType)
    {
        return view('violation_types.edit', compact('violationType'));
    }

    public function update(Request $request, ViolationType $violationType)
    {
        $request->validate([
            'code' => 'required|unique:violation_types,code,' . $violationType->id,
            'name' => 'required',
            'points' => 'required|integer',
        ]);

        $violationType->update($request->all());

        return redirect()->route('violation-types.index')->with('success', 'Jenis pelanggaran berhasil diperbarui.');
    }

    public function destroy(ViolationType $violationType)
    {
        $violationType->delete();
        return redirect()->route('violation-types.index')->with('success', 'Jenis pelanggaran berhasil dihapus.');
    }
}
