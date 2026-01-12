@extends('dashboard.wali_kelas.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Siswa Kelas Saya</h1>

<table class="w-full border">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
<tbody>
@if($siswa->count())
    @foreach($siswa as $item)
    <tr>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->nis }}</td>
        <td>{{ $item->kelas->nama_kelas ?? '-' }}</td>            
        <td>
                <a href="{{ route('wali_kelas.siswa.show', $item->id) }}"
                   class="text-blue-600">
                   Detail
                </a>
            </td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="4" class="text-center text-gray-500">
            Tidak ada siswa
        </td>
    </tr>
@endif
</tbody>

</table>
@endsection
