@extends('dashboard.petugas.main')

@section('content')
<div class="bg-white rounded-xl shadow p-6">

    <h1 class="text-lg font-bold mb-4">Riwayat Prestasi</h1>

    @if(session('success'))
        <div class="mb-3 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full text-sm">
        <thead>
            <tr class="border-b">
                <th>Siswa</th>
                <th>Prestasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestasi as $p)
            <tr class="border-b">
                <td>{{ $p->siswa->nama }}</td>
                <td>{{ optional($p->jenis)->nama ?? '-' }}</td>
                <td>
                    <span class="px-2 py-1 rounded text-xs
                        {{ $p->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                        {{ ucfirst($p->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
