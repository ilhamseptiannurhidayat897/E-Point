@extends('dashboard.admin.main')

@section('content')
<div class="p-6 max-w-xl">

    <h1 class="text-xl font-bold mb-4">Tambah Wali Kelas</h1>

    <form action="{{ route('walikelas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas_id" class="w-full border rounded p-2">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
