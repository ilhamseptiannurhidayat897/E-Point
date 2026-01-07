@extends('dashboard.wali_kelas.main')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    {{-- TOTAL SISWA --}}
    <div class="bg-white rounded-xl p-5 shadow">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <h2 class="text-2xl font-bold text-primary mt-1">
            {{ $totalSiswa ?? 0 }}
        </h2>
    </div>

    {{-- TOTAL PELANGGARAN --}}
    <div class="bg-white rounded-xl p-5 shadow">
        <p class="text-sm text-gray-500">Pelanggaran</p>
        <h2 class="text-2xl font-bold text-red-600 mt-1">
            {{ $totalPelanggaran ?? 0 }}
        </h2>
    </div>

    {{-- TOTAL PRESTASI --}}
    <div class="bg-white rounded-xl p-5 shadow">
        <p class="text-sm text-gray-500">Prestasi</p>
        <h2 class="text-2xl font-bold text-green-600 mt-1">
            {{ $totalPrestasi ?? 0 }}
        </h2>
    </div>

    {{-- TOTAL POIN --}}
    <div class="bg-white rounded-xl p-5 shadow">
        <p class="text-sm text-gray-500">Total Poin Kelas</p>
        <h2 class="text-2xl font-bold text-purple-700 mt-1">
            {{ $totalPoin ?? 0 }}
        </h2>
    </div>

</div>

@endsection
