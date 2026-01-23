<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithHeadings, WithMapping
{
    protected $no = 1;

    public function collection()
    {
        return Siswa::with('kelas')
            ->orderBy('kelas_id')
            ->orderBy('nama')
            ->get();
    }

    public function map($siswa): array
    {
        return [
            $this->no++,
            $siswa->nis,
            $siswa->nama,
            $siswa->kelas->nama_kelas ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'NIS',
            'Nama Siswa',
            'Kelas',
        ];
    }
}
