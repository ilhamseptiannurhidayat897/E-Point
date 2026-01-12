@extends('dashboard.bk.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Detail Siswa</h1>

<p><b>Nama:</b> {{ $siswa->nama }}</p>
<p><b>NIS:</b> {{ $siswa->nis }}</p>
<p><b>Kelas:</b> {{ $siswa->kelas->nama_kelas }}</p>
<p><b>Wali Kelas:</b> {{ $siswa->kelas->walikelas->nama ?? '-' }}</p>

<hr class="my-4">

<h2 class="font-bold">Pelanggaran</h2>
<ul>
@forelse ($siswa->pelanggaran as $p)
    <li>{{ $p->jenis->nama }} ({{ $p->status }})</li>
@empty
    <li>Tidak ada pelanggaran</li>
@endforelse
</ul>

<hr class="my-4">

<h2 class="font-bold">Prestasi</h2>
<ul>
@forelse ($siswa->prestasi as $p)
    <li>{{ $p->jenis->nama }} ({{ $p->status }}) ({{ $p->foto }})</li>
@empty
    <li>Tidak ada prestasi</li>
@endforelse
</ul>

<a href="{{ route('bk.siswa.index') }}" class="text-blue-600 mt-4 inline-block">
    ← Kembali
</a>
@endsection
