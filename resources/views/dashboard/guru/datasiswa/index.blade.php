@extends('dashboard.guru.main')

@section('content')

<h2 class="text-2xl font-bold mb-4">Data Siswa</h2>

<a href="{{ route('datasiswa.create') }}"
   class="bg-primary text-white px-4 py-2 rounded mb-4 inline-block">
   Tambah Siswa
</a>

<table class="w-full bg-white rounded shadow">
<tr class="bg-gray-100">
    <th>No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>JK</th>
    <th>Kelas</th>
    <th>Aksi</th>
</tr>

@foreach($siswa as $s)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $s->nis }}</td>
    <td>{{ $s->nama }}</td>
    <td>{{ $s->jk }}</td>
    <td>{{ $s->kelas }}</td>
    <td>
        <a href="{{ route('datasiswa.edit',$s->id) }}">Edit</a>
    </td>
</tr>
@endforeach
</table>

@endsection
