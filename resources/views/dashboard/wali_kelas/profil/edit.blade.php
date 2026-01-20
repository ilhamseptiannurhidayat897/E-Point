@extends('dashboard.wali_kelas.main')

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

    <form action="{{ route('wali_kelas.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" value="{{ $walikelas->nama }}"
                   class="w-full border rounded px-3 py-2 bg-gray-100"
                   disabled>
        </div>


        <hr class="my-6">

        <h2 class="text-lg font-semibold mb-3">Ganti Password</h2>

         <div class="mb-4">
        <label>Password Lama</label>
        <input type="password" name="current_password" class="w-full border px-3 py-2">
    </div>

    <div class="mb-4">
        <label>Password Baru</label>
        <input type="password" name="password" class="w-full border px-3 py-2">
    </div>

    <div class="mb-4">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="w-full border px-3 py-2">
    </div>

    <button class="bg-purple-700 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>
</div>
@endsection
