@extends('dashboard.siswa.main')

@section('content')
<h4 class="mb-4">Prestasi Saya (Diterima)</h4>

<table class="table table-bordered align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Prestasi</th>
            <th>Poin</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
    @forelse($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>
                @if($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}"
                         class="rounded shadow"
                         width="70">
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>

            <td>{{ $item->jenis->nama }}</td>

            <td class="text-success fw-bold">
                +{{ $item->jenis->poin }}
            </td>

            <td>{{ $item->keterangan ?? '-' }}</td>

            <td>{{ $item->verified_at?->format('d-m-Y') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-muted">
                Belum ada prestasi diterima
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
