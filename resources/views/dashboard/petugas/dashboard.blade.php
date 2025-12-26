@extends('dashboard.petugas.main')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">Dashboard Petugas</h1>

    {{-- Statistik --}}
    {{-- <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm">Total Siswa</p>
            <p class="text-xl font-bold">{{ $totalSiswa }}</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm">Pelanggaran</p>
            <p class="text-xl font-bold">{{ $totalPelanggaran }}</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm">Kebaikan</p>
            <p class="text-xl font-bold">{{ $totalKebaikan }}</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <p class="text-sm">Total Poin</p>
            <p class="text-xl font-bold">{{ $totalNetto }}</p>
        </div>
    </div> --}}

    Aktivitas Terakhir
    <div class="bg-white rounded shadow p-4">
        <h2 class="text-lg font-semibold mb-4">Aktivitas Terakhir</h2>

        <table class="w-full text-sm">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">Tanggal</th>
                    <th class="text-left py-2">Siswa</th>
                    <th class="text-left py-2">Kelas</th>
                    <th class="text-left py-2">Keterangan</th>
                    <th class="text-left py-2">Poin</th>
                </tr>
            </thead>
            {{-- <tbody>
                @forelse ($activities as $a)
                <tr class="border-b">
                    <td>{{ $a->created_at }}</td>
                    <td>{{ $a->nama_siswa }}</td>
                    <td>{{ $a->nama_kelas }}</td>
                    <td>{{ $a->keterangan }}</td>
                    <td>{{ $a->poin }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
                        Belum ada data
                    </td>
                </tr>
                @endforelse
            </tbody> --}}
        </table>
    </div>

</div>
@endsection
