@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-white mb-6">Tambah Siswa</h1>

<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-[#1e1e2f] p-6 rounded-xl border border-gray-700">
    @csrf

    <div>
        <label class="text-gray-300">NIS</label>
        <input type="text" name="nis" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
    </div>

    <div>
        <label class="text-gray-300">Nama</label>
        <input type="text" name="name" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="text-gray-300">Tingkat</label>
            <input type="text" name="tingkat" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
        </div>

        <div>
            <label class="text-gray-300">Jurusan</label>
            <input type="text" name="jurusan" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
        </div>

        <div>
            <label class="text-gray-300">Kelas</label>
            <input type="text" name="kelas" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
        </div>
    </div>

    <div>
        <label class="text-gray-300">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

    <div>
        <label class="text-gray-300">Alamat</label>
        <textarea name="alamat" class="w-full p-2 rounded bg-[#0f0f19] text-white border border-gray-700"></textarea>
    </div>

    <div>
        <label class="text-gray-300">Foto</label>
        <input type="file" name="photo" class="text-gray-300">
    </div>

    <button class="px-4 py-2 bg-[#4cc9f0] rounded hover:bg-[#3bb0d6]">Simpan</button>
</form>
@endsection
