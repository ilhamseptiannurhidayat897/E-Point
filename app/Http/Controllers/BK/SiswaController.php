<?php

namespace App\Http\Controllers\BK;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request; // Tambahkan ini untuk menangkap request

class SiswaController extends Controller
{
    /**
     * List semua siswa (BK)
     */
    public function index(Request $request)
    {
        // 1. Buat query dasar
        $query = Siswa::query();

        // 2. Logika Pencarian (Jika ada input 'search')
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // 3. Pengurutan Data (Urut Nama dari A-Z)
        // Menghapus 'latest()' dan menggantinya dengan orderBy('nama', 'asc')
        $query->orderBy('nama', 'asc');

        // 4. Eksekusi Query dengan Pagination
        $siswa = $query->with([
            'kelas.walikelas',
            'pelanggaran.jenisPelanggaran',
            'prestasi.jenis'
        ])->paginate(30);

        // 5. Append Query String ke Link Pagination (Supaya search tidak hilang saat ganti halaman)
        $siswa->appends($request->except('page'));

        // Data kelas untuk dropdown filter PDF
        $kelas = Kelas::orderBy('nama_kelas')->get();

        // 6. Persiapan Data untuk Modal
        // Menggunakan collection dari hasil pagination yang sudah difilter/diurutkan
        $siswaData = $siswa->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama,
                'nis' => $item->nis,
                'kelas' => $item->kelas->nama_kelas ?? '-',
                'walikelas' => $item->kelas->walikelas->nama ?? '-',
                'pelanggaran' => $item->pelanggaran->map(function ($p) {
                    return [
                        'nama' => $p->jenisPelanggaran->nama ?? '-',
                        'poin' => $p->jenisPelanggaran->poin ?? 0,
                        'status' => $p->status,
                        'tanggal' => $p->created_at->format('d M Y'),
                    ];
                })->values(),
                'prestasi' => $item->prestasi->map(function ($p) {
                    return [
                        'nama' => $p->jenis->nama ?? '-',
                        'poin' => $p->jenis->poin ?? 0,
                        'status' => $p->status,
                        'tanggal' => $p->created_at->format('d M Y'),
                        'foto' => $p->foto,
                    ];
                })->values(),
            ];
        })->keyBy('id');

        return view(
            'dashboard.bk.siswa.index',
            compact('siswa', 'siswaData', 'kelas')
        );
    }      
    
    /**
     * Detail siswa
     */
    public function show(Siswa $siswa)
    {
        $siswa->load([
            'kelas.walikelas',
            'pelanggaran.jenisPelanggaran',
            'prestasi.jenis'
        ]);

        return view('dashboard.bk.siswa.show', compact('siswa'));
    }
}