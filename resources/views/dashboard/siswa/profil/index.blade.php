@extends('dashboard.siswa.main')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Profil Saya</h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <div class="mb-3">
            <strong>Nama</strong>
            <div>{{ $siswa->nama }}</div>
        </div>

        <div class="mb-3">
            <strong>NIS</strong>
            <div>{{ $siswa->nis }}</div>
        </div>

        <div class="mb-3">
            <strong>Jenis Kelamin</strong>
            <div>{{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
        </div>

        <div class="mb-3">
            <strong>Kelas</strong>
            <div>{{ $siswa->kelas->nama_kelas ?? '-' }}</div>
        </div>

        <div class="mb-3">
            <strong>Alamat</strong>
            <div>{{ $siswa->alamat ?? '-' }}</div>
        </div>

        <a href="{{ route('siswa.profil.edit') }}"
           class="inline-block mt-4 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800">
            Edit Profil
        </a>
    </div>
</div>
@endsection
