@extends('dashboard.admin.main')

@section('content')
<div class="p-6 max-w-xl">

    <h1 class="text-xl font-bold mb-4">Edit Wali Kelas</h1>

    <form action="{{ route('walikelas.update', $walikelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama"
                   value="{{ $walikelas->nama }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip"
                   value="{{ $walikelas->nip }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas_id" class="w-full border rounded p-2">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}"
                        {{ $walikelas->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
