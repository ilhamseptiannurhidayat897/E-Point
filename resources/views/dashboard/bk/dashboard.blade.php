@extends('dashboard.bk.main')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard BK</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

    <div class="bg-white shadow rounded p-4">
        <p class="text-gray-500">Total Pelanggaran</p>
        <h2 class="text-3xl font-bold">{{ $totalPelanggaran }}</h2>
    </div>

    <div class="bg-yellow-100 shadow rounded p-4">
        <p class="text-gray-600">Pending</p>
        <h2 class="text-3xl font-bold">{{ $pending }}</h2>
    </div>

    <div class="bg-green-100 shadow rounded p-4">
        <p class="text-gray-600">Terverifikasi</p>
        <h2 class="text-3xl font-bold">{{ $verifikasi }}</h2>
    </div>

    <div class="bg-blue-100 shadow rounded p-4">
        <p class="text-gray-600">Total Siswa</p>
        <h2 class="text-3xl font-bold">{{ $totalSiswa }}</h2>
    </div>

</div>
@endsection
