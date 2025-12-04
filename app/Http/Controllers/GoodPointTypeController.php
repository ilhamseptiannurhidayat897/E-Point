<?php

namespace App\Http\Controllers;

use App\Models\GoodPointType;
use Illuminate\Http\Request;

class GoodPointTypeController extends Controller
{
    public function index()
    {
        $types = GoodPointType::latest()->paginate(10);
        return view('good_point_types.index', compact('types'));
    }

    public function create()
    {
        return view('good_point_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:good_point_types',
            'name' => 'required',
            'points' => 'required|integer'
        ]);

        GoodPointType::create($request->all());

        return redirect()->route('good-point-types.index')->with('success', 'Jenis poin kebaikan berhasil ditambahkan.');
    }

    public function edit(GoodPointType $goodPointType)
    {
        return view('good_point_types.edit', compact('goodPointType'));
    }

    public function update(Request $request, GoodPointType $goodPointType)
    {
        $request->validate([
            'code' => 'required|unique:good_point_types,code,' . $goodPointType->id,
            'name' => 'required',
            'points' => 'required|integer'
        ]);

        $goodPointType->update($request->all());

        return redirect()->route('good-point-types.index')->with('success', 'Jenis poin kebaikan berhasil diperbarui.');
    }

    public function destroy(GoodPointType $goodPointType)
    {
        $goodPointType->delete();
        return redirect()->route('good-point-types.index')->with('success', 'Jenis poin kebaikan berhasil dihapus.');
    }
}
