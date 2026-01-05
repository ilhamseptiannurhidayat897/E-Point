@extends('dashboard.admin.main')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-xl font-bold mb-4">Edit Jenis Prestasi</h1>

    <form action="{{ route('jenisprestasi.update', $jenisprestasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Prestasi</label>
            <input type="text" name="nama"
                   value="{{ $jenisprestasi->nama }}"
                   class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label>Poin</label>
            <input type="number" name="poin"
                   value="{{ $jenisprestasi->poin }}"
                   class="w-full border p-2" required>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
