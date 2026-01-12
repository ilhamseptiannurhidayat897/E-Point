@extends('dashboard.bk.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Siswa</h1>

<table class="w-full border">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Wali Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nis }}</td>
            <td>{{ $item->kelas->nama_kelas }}</td>
            <td>{{ $item->kelas->walikelas->nama }}</td>
            <td>
                <a href="{{ route('bk.siswa.show', $item->id) }}"
                   class="text-blue-600">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
