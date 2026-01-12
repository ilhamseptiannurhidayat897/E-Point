@extends('dashboard.siswa.main')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Profil</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.profil.update') }}" method="POST"
          class="bg-white rounded-lg shadow p-6 max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" value="{{ $siswa->nama }}"
                   class="w-full border rounded px-3 py-2 bg-gray-100"
                   disabled>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">NIS</label>
            <input type="text" value="{{ $siswa->nis }}"
                   class="w-full border rounded px-3 py-2 bg-gray-100"
                   disabled>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Alamat</label>
            <textarea name="alamat"
                      class="w-full border rounded px-3 py-2"
                      rows="3">{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit"
                    class="px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800">
                Simpan
            </button>

            <a href="{{ route('siswa.profil') }}"
               class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
