@extends('dashboard.admin.main')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-xl font-bold mb-4">Edit Jenis Pelanggaran</h1>

    <form action="{{ route('jenispelanggaran.update', $jenispelanggaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Pelanggaran</label>
            <input type="text" name="nama"
                   value="{{ $jenispelanggaran->nama }}"
                   class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label>Poin</label>
            <input type="number" name="poin"
                   value="{{ $jenispelanggaran->poin }}"
                   class="w-full border p-2" required>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
