@extends('dashboard.petugas.main')

@section('content')
<div class="max-w-xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">Input Pelanggaran Siswa</h1>

    <div class="bg-white p-6 rounded-xl shadow">
        <form action="{{ route('inputpelanggaran.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Siswa</label>
                <select name="siswa_id" class="w-full rounded-lg border-gray-300">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswa as $s)
                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Jenis Pelanggaran</label>
                <select name="jenis_pelanggaran_id" class="w-full rounded-lg border-gray-300">
                    <option value="">-- Pilih Pelanggaran --</option>
                    @foreach ($jenisPelanggaran as $jp)
                        <option value="{{ $jp->id }}">
                            {{ $jp->nama }} ({{ $jp->poin }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Keterangan</label>
                <textarea name="keterangan" rows="3"
                    class="w-full rounded-lg border-gray-300"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Tanggal</label>
                <input type="date" name="tanggal"
                    value="{{ date('Y-m-d') }}"
                    class="w-full rounded-lg border-gray-300">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('dashboard.petugas') }}" class="px-4 py-2 border rounded-lg">
                    Batal
                </a>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
