@extends('dashboard.bk.main')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Riwayat Verifikasi Prestasi</h4>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Prestasi</th>
                        <th>Poin</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->siswa->nama }}</td>
                        <td>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>
                        <td>{{ $item->jenis->nama }}</td>
                        <td class="text-success fw-bold">
                            +{{ $item->jenis->poin }}
                        </td>
                        <td>
                            <span class="badge {{ $item->status == 'diterima' ? 'bg-success' : 'bg-danger' }}">
                                {{ strtoupper($item->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-muted">
                            Belum ada riwayat verifikasi
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
