@extends('dashboard.admin.main')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-xl font-bold mb-4">Edit Siswa</h1>

    <form action="{{ route('datasiswa.update', $datasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis"
                   value="{{ $datasiswa->nis }}"
                   class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama"
                   value="{{ $datasiswa->nama }}"
                   class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jk" class="w-full border p-2">
                <option value="L" {{ $datasiswa->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $datasiswa->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas_id" class="w-full border p-2">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}"
                        {{ $datasiswa->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="w-full border p-2">{{ $datasiswa->alamat }}</textarea>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
