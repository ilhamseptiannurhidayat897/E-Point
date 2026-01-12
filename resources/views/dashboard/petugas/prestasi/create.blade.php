@extends('dashboard.petugas.main')

@section('content')
<div class="max-w-xl bg-white rounded-xl shadow p-6">

    <h1 class="text-lg font-bold mb-4">Input Prestasi Siswa</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inputprestasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Siswa --}}
        <div class="mb-4">
            <label class="font-medium">Siswa</label>
            <select name="siswa_id" class="w-full border rounded p-2">
                <option value="">-- Pilih Siswa --</option>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        {{-- Jenis Prestasi --}}
        <div class="mb-4">
            <label class="font-medium">Jenis Prestasi</label>
            <select name="jenis_prestasi_id" class="w-full border rounded p-2">
                <option value="">-- Pilih --</option>
                @foreach($jenis as $j)
                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                @endforeach
            </select>
        </div>

        {{-- Keterangan --}}
        <div class="mb-4">
            <label class="font-medium">Keterangan</label>
            <textarea name="keterangan" class="w-full border rounded p-2" rows="3"></textarea>
        </div>

        {{-- Foto --}}
        <div class="mb-4">
            <label class="font-medium">Foto (opsional)</label>
            <input type="file" name="foto">
        </div>

        <button class="bg-primary text-white px-4 py-2 rounded">
            Simpan Prestasi
        </button>
    </form>
</div>
@endsection
