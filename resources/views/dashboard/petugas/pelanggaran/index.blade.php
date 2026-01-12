@extends('dashboard.petugas.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Riwayat Pelanggaran</h1>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<table class="w-full bg-white rounded shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3">Siswa</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pelanggaran as $p)
        <tr class="border-t">
            <td class="p-3">{{ $p->siswa->nama }}</td>
            <td>{{ $p->jenisPelanggaran->nama }}</td>
            <td>
                <span class="px-2 py-1 rounded text-xs
                    {{ $p->status == 'pending' ? 'bg-yellow-200' : 'bg-green-200' }}">
                    {{ ucfirst($p->status) }}
                </span>
            </td>
            <td>{{ $p->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
