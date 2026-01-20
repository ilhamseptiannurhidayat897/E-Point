@extends('dashboard.bk.main')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Profil BK</h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow space-y-3">
        <div>
            <strong>Nama:</strong> {{ $bk->nama }}
        </div>
        <div>
            <strong>NIP:</strong> {{ $bk->nip ?? '-' }}
        </div>

        <a href="{{ route('bk.profil.edit') }}"
           class="inline-block mt-4 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800">
            Edit Password
        </a>
    </div>
</div>
@endsection
