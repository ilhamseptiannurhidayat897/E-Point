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

        <div class="bg-white rounded shadow p-4">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b">
                    <th class="py-2 text-left">Tanggal</th>
                    <th class="py-2 text-left">Siswa</th>
                    <th class="py-2 text-left">Jenis</th>
                    <th class="py-2 text-left">Keterangan</th>
                    <th class="py-2 text-right">Poin</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($activities as $a)
                <tr class="border-b hover:bg-gray-50">
                    <td>{{ $a['tanggal'] }}</td>
                    <td>{{ $a['siswa'] }}</td>

                    <td>
                        <span class="px-2 py-1 text-xs rounded
                            {{ $a['jenis'] == 'Kebaikan' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $a['jenis'] }}
                        </span>
                    </td>

                    <td>{{ $a['keterangan'] }}</td>

                    <td class="text-right font-bold text-{{ $a['warna'] }}-600">
                        {{ $a['poin'] > 0 ? '+' : '' }}{{ $a['poin'] }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-4">
                        Belum ada aktivitas
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
    </div>

</div>
@endsection
