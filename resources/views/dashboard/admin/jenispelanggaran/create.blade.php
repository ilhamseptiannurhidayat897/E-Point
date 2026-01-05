@extends('dashboard.admin.main')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-xl font-bold mb-4">Tambah Jenis Pelanggaran</h1>

    <form action="{{ route('jenispelanggaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Pelanggaran</label>
            <input type="text" name="nama" class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label>Poin</label>
            <input type="number" name="poin" class="w-full border p-2" required>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
