@extends('dashboard.bk.main')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Riwayat Verifikasi Pelanggaran</h4>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Pelanggaran</th>
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
                        <td>{{ $item->jenisPelanggaran->nama }}</td>
                        <td class="text-danger fw-bold">
                            -{{ $item->jenisPelanggaran->poin }}
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
