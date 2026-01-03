@extends('dashboard.admin.main')

@section('content')
<div class="card">
    <div class="card-header flex justify-between items-center">
        <h4>Data Kelas</h4>
        <a href="{{ route('datakelas.create') }}" class="btn btn-primary">
            + Tambah Kelas
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Tingkat</th>
                    <th>Jurusan</th>
                    <th>Konsentrasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $item)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td><b>{{ $item->nama_kelas }}</b></td>
                    <td>{{ $item->tingkat }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>{{ $item->konsentrasi ?? '-' }}</td>
                    <td>
                        <a href="{{ route('datakelas.edit',$item->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('datakelas.destroy',$item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus kelas ini?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($kelas->count() == 0)
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Data kelas belum ada
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
