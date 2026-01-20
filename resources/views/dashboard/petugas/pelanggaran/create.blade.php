@extends('dashboard.petugas.main')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-xl font-bold mb-4">Input Pelanggaran</h1>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('inputpelanggaran.store') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Siswa</label>
        <select name="siswa_id" class="form-control" required>
            <option value="">-- Pilih Siswa --</option>
            @foreach ($siswa as $s)
                <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Jenis Pelanggaran</label>
        <select name="jenis_pelanggaran_id" class="form-control" required>
            <option value="">-- Pilih Jenis --</option>
            @foreach ($jenis as $j)
                <option value="{{ $j->id }}">{{ $j->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Foto (opsional)</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>

</div>
@endsection
