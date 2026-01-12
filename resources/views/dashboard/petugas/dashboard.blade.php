@extends('dashboard.petugas.main')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard Petugas</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <h2 class="text-3xl font-bold">{{ $totalSiswa }}</h2>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-500">Pelanggaran Hari Ini</p>
        <h2 class="text-3xl font-bold text-red-600">{{ $pelanggaranHariIni }}</h2>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-500">Prestasi Hari Ini</p>
        <h2 class="text-3xl font-bold text-green-600">{{ $prestasiHariIni }}</h2>
    </div>

</div>

<div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-lg font-semibold mb-4">Pelanggaran Terbaru</h2>

    <table class="w-full text-sm">
        <thead>
            <tr class="text-gray-500">
                <th class="text-left">Siswa</th>
                <th class="text-left">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggaranTerbaru as $item)
                <tr class="border-t">
                    <td class="py-2">{{ $item->siswa->nama ?? '-' }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
