@extends('dashboard.admin.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Petugas</h1>

<form method="POST" action="{{ route('datapetugas.store') }}">
@csrf

<label>NK</label>
<input type="text" name="nk" class="border w-full mb-3" required>

<label>Nama</label>
<input type="text" name="nama" class="border w-full mb-3" required>

<button class="bg-purple-600 text-white px-4 py-2 rounded">
Simpan
</button>
</form>
@endsection
