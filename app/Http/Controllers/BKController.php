<?php

namespace App\Http\Controllers;

use App\Models\BK;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BKController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.databk.index', [
            'bk' => BK::latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.databk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'  => 'required|unique:bk,nip|unique:users,login_id',
            'nama' => 'required',
        ]);

        DB::transaction(function () use ($request) {

            $user = User::create([
                'login_id' => $request->nip,
                'password' => Hash::make('12345678'),
                'role'     => 'bk',
            ]);

            BK::create([
                'user_id' => $user->id,
                'nip'     => $request->nip,
                'nama'    => $request->nama,
            ]);
        });

        return redirect()->route('databk.index')
            ->with('success', 'BK berhasil ditambahkan (Password: 12345678)');
    }

    public function edit($id)
    {
        return view('dashboard.admin.databk.edit', [
            'bk' => BK::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $bk = BK::findOrFail($id);

        $request->validate([
            'nip'  => 'required|unique:bk,nip,' . $bk->id,
            'nama' => 'required',
        ]);

        $bk->update($request->only('nip', 'nama'));

        return redirect()->route('databk.index')
            ->with('success', 'Data BK berhasil diupdate');
    }

    public function destroy($id)
    {
        BK::findOrFail($id)->delete();
        return back()->with('success', 'Data BK dihapus');
    }
}
