@extends('dashboard.petugas.main')

@section('content')
<div class="max-w-xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">Input Kebaikan Siswa</h1>

    <div class="bg-white p-6 rounded-xl shadow">

        @if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-700">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('kebaikan.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Siswa --}}
            <div>
                <label class="block text-sm font-medium mb-1">Siswa</label>
                <select name="siswa_id" required
                    class="w-full rounded-lg border-gray-300">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswa as $s)
                        <option value="{{ $s->id }}">
                            {{ $s->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Jenis Kebaikan --}}
            <div>
                <label class="block text-sm font-medium mb-1">Jenis Kebaikan</label>
                <select name="jenis_kebaikan_id" required
                    class="w-full rounded-lg border-gray-300">
                    <option value="">-- Pilih Jenis Kebaikan --</option>
                    @foreach ($jenisKebaikan as $jk)
                        <option value="{{ $jk->id }}">
                            {{ $jk->nama }} (+{{ $jk->poin }} poin)
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Keterangan --}}
            <div>
                <label class="block text-sm font-medium mb-1">Keterangan</label>
                <textarea name="keterangan" rows="3"
                    class="w-full rounded-lg border-gray-300"
                    placeholder="Contoh: Membantu guru membawa buku"></textarea>
            </div>

            {{-- Tanggal --}}
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal</label>
                <input type="date" name="tanggal"
                    class="w-full rounded-lg border-gray-300"
                    value="{{ date('Y-m-d') }}">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('dashboard.petugas') }}"
                   class="px-4 py-2 border rounded-lg">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
