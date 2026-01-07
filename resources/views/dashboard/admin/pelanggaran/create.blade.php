@extends('dashboard.admin.main')

@section('content')
<div class="p-6 max-w-xl">

    <h1 class="text-xl font-bold mb-4">Tambah Pelanggaran</h1>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('pelanggaran.store') }}"
          enctype="multipart/form-data"
          class="bg-white p-4 rounded shadow">

        @csrf

        {{-- SISWA --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Siswa</label>

            <input
                type="text"
                id="searchSiswa"
                placeholder="Cari nama / NIS siswa..."
                class="w-full border rounded px-3 py-2 mb-2"
                onkeyup="filterSelect('searchSiswa','siswaSelect')"
            >

            <select
                name="siswa_id"
                id="siswaSelect"
                class="w-full border rounded px-3 py-2"
                required
            >
                <option value="">-- Pilih Siswa --</option>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}">
                        {{ $s->nama }} - {{ $s->nis }}
                    </option>
                @endforeach
            </select>
        </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Jenis Pelanggaran</label>

        <input
            type="text"
            id="searchJenis"
            placeholder="Cari jenis pelanggaran..."
            class="w-full border rounded px-3 py-2 mb-2"
            onkeyup="filterSelect('searchJenis','jenisSelect')"
        >

        <select
            name="jenis_pelanggaran_id"
            id="jenisSelect"
            class="w-full border rounded px-3 py-2"
            required
        >
            <option value="">-- Pilih Jenis Pelanggaran --</option>
            @foreach($jenis as $j)
                <option value="{{ $j->id }}">
                    {{ $j->nama }}
                </option>
            @endforeach
        </select>
    </div>

        {{-- KETERANGAN --}}
        <div class="mb-3">
            <label class="block mb-1 font-medium">Keterangan</label>
            <textarea name="keterangan"
                class="w-full border rounded p-2"
                rows="3">{{ old('keterangan') }}</textarea>
        </div>

        {{-- FOTO --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Foto Bukti (opsional)</label>
            <input type="file" name="foto" class="w-full border rounded p-2">
        </div>

        {{-- BUTTON --}}
        <div class="flex gap-2">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan
            </button>

            <a href="{{ route('pelanggaran.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </form>

</div>
<script>
function filterSelect(inputId, selectId) {
    const input = document.getElementById(inputId).value.toLowerCase();
    const select = document.getElementById(selectId);
    const options = select.options;

    for (let i = 0; i < options.length; i++) {
        const text = options[i].text.toLowerCase();
        options[i].style.display = text.includes(input) ? '' : 'none';
    }
}
</script>

@endsection
