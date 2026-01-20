@extends('dashboard.bk.main')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Ganti Password</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bk.profil.update') }}" method="POST"
          class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Password Lama</label>
            <input type="password" name="current_password"
                class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Password Baru</label>
            <input type="password" name="password"
                class="w-full border px-3 py-2">
        </div>

        <div class="mb-4">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                class="w-full border px-3 py-2">
        </div>

        <button class="bg-purple-700 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
