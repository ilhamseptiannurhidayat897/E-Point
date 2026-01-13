@extends('dashboard.bk.main')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4">Verifikasi Prestasi Siswa</h4>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jenis Prestasi</th>
                        <th>Poin</th>
                        <th>Petugas</th>
                        <th>Foto</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->siswa->nama }}</td>
                        <td>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</td>
                        <td>{{ $item->jenis->nama }}</td>
                        <td class="fw-bold text-success">
                            +{{ $item->jenis->poin }}
                        </td>
                        <td>
                            {{ $item->petugas->nama ?? $item->admin->nama ?? '-' }}
                        </td>
                        <td>
                            @if($item->foto)
                                <a href="{{ asset('storage/'.$item->foto) }}" target="_blank">
                                    <img src="{{ asset('storage/'.$item->foto) }}" width="60">
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                        <td>
                            <form action="{{ route('bk.prestasi.verifikasi', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin memverifikasi?')">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        name="status"
                                        value="diterima"
                                        class="btn btn-success btn-sm mb-1">
                                    Terima
                                </button>

                                <button type="submit"
                                        name="status"
                                        value="ditolak"
                                        class="btn btn-danger btn-sm">
                                    Tolak
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-muted">
                            Tidak ada prestasi yang menunggu verifikasi
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
