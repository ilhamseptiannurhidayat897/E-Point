@extends('dashboard.petugas.main')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    {{-- Total Siswa --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-md transition">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <h2 class="text-4xl font-bold text-primary mt-2">120</h2>
    </div>

    {{-- Pelanggaran Hari Ini --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-md transition">
        <p class="text-sm text-gray-500">Pelanggaran Hari Ini</p>
        <h2 class="text-4xl font-bold text-red-500 mt-2">5</h2>
    </div>

    {{-- Prestasi Hari Ini --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border hover:shadow-md transition">
        <p class="text-sm text-gray-500">Prestasi Hari Ini</p>
        <h2 class="text-4xl font-bold text-green-500 mt-2">3</h2>
    </div>

</div>

@endsection
