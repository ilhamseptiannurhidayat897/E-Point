@extends('dashboard.admin.main')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-xl font-bold">Data BK</h1>
    <a href="{{ route('databk.create') }}" class="btn btn-primary">+ Tambah BK</a>
</div>

@if(session('success'))
<div class="alert alert-success mb-3">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered w-full">
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bk as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->nama }}</td>
            <td class="flex gap-2">
                <a href="{{ route('databk.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('databk.destroy',$item->id) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus BK ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection