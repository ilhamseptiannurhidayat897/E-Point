@extends('dashboard.admin.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit BK</h1>

<form action="{{ route('databk.update',$bk->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" value="{{ $bk->nip }}" class="form-control" required>
        @error('nip') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $bk->nama }}" class="form-control" required>
        @error('nama') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('databk.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection