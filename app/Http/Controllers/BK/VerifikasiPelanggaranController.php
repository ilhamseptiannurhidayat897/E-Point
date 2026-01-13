<?php

namespace App\Http\Controllers\BK;

use App\Http\Controllers\Controller;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiPelanggaranController extends Controller
{
    // daftar pelanggaran pending
    public function index()
    {
        $data = Pelanggaran::with([
                'siswa',
                'jenisPelanggaran',
                'petugas',
                'admin'
            ])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('dashboard.bk.pelanggaran.index', compact('data'));
    }

    // proses verifikasi
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak'
        ]);

        DB::transaction(function () use ($request, $id) {

            $pelanggaran = Pelanggaran::with('siswa','jenisPelanggaran')
                ->lockForUpdate()
                ->findOrFail($id);

            // update status
            $pelanggaran->update([
                'status'      => $request->status,
                'verified_by' => auth()->id(),
                'verified_at' => now(),
            ]);

            // jika diterima → kurangi poin siswa
            if ($request->status === 'diterima') {
                $pelanggaran->siswa->decrement(
                    'poin',
                    $pelanggaran->jenisPelanggaran->poin
                );
            }
        });

        return back()->with('success', 'Pelanggaran berhasil diverifikasi');
    }
    public function riwayat()
    {
        $data = Pelanggaran::with([
                'siswa',
                'jenisPelanggaran',
                'verifikator',
                'petugas',
                'admin'
            ])
            ->whereIn('status', ['diterima','ditolak'])
            ->latest('verified_at')
            ->get();

        return view('dashboard.bk.pelanggaran.riwayat', compact('data'));
    }
}
