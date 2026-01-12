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

    <form action="{{ route('inputpelanggaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="font-medium">Siswa</label>
        
            <select name="siswa_id"
                class="w-full border rounded p-2
                @error('siswa_id') border-red-500 @enderror">
                <option value="">-- Pilih Siswa --</option>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}"
                        {{ old('siswa_id') == $s->id ? 'selected' : '' }}>
                        {{ $s->nama }}
                    </option>
                @endforeach
            </select>
        
            @error('siswa_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        

        <div class="mb-4">
            <label class="font-medium">Jenis Pelanggaran</label>
        
            <select name="jenis_pelanggaran_id"
                class="w-full border rounded p-2
                @error('jenis_pelanggaran_id') border-red-500 @enderror">
        
                <option value="">-- Pilih --</option>
                @foreach($jenis as $j)
                    <option value="{{ $j->id }}"
                        {{ old('jenis_pelanggaran_id') == $j->id ? 'selected' : '' }}>
                        {{ $j->nama }}
                    </option>
                @endforeach
            </select>
        
            @error('jenis_pelanggaran_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        

        <div class="mb-4">
            <label class="font-medium">Keterangan</label>
        
            <textarea name="keterangan"
                class="w-full border rounded p-2
                @error('keterangan') border-red-500 @enderror"
                rows="3">{{ old('keterangan') }}</textarea>
        
            @error('keterangan')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        

        <div class="mb-4">
            <label class="font-medium">Foto (opsional)</label>
        
            <input type="file" name="foto"
                class="w-full
                @error('foto') border-red-500 @enderror">
        
            @error('foto')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
        

        <button class="bg-purple-700 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
