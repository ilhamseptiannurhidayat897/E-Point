<?php

namespace App\Http\Controllers\BK;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiPrestasiController extends Controller
{
    // daftar prestasi pending
    public function index()
    {
        $data = Prestasi::with([
                'siswa',
                'jenis',
                'petugas',
                'admin'
            ])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('dashboard.bk.prestasi.index', compact('data'));
    }

    // proses verifikasi
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak'
        ]);

        DB::transaction(function () use ($request, $id) {

            $prestasi = Prestasi::with('siswa','jenis')
                ->lockForUpdate()
                ->findOrFail($id);

            // update status
            $prestasi->update([
                'status'      => $request->status,
                'verified_by' => auth()->id(),
                'verified_at' => now(),
            ]);

            // jika diterima → tambah poin siswa
            if ($request->status === 'diterima') {
                $prestasi->siswa->increment(
                    'poin',
                    $prestasi->jenis->poin
                );
            }
        });

        return back()->with('success', 'Prestasi berhasil diverifikasi');
    }
    public function riwayat()
    {
        $data = Prestasi::with([
                'siswa',
                'jenis',
                'verifikator',
                'petugas',
                'admin'
            ])
            ->whereIn('status', ['diterima','ditolak'])
            ->latest('verified_at')
            ->get();

        return view('dashboard.bk.prestasi.riwayat', compact('data'));
    }
}
