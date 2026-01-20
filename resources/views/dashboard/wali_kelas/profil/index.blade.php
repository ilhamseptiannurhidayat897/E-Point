@extends('dashboard.wali_kelas.main')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Profil Wali Kelas</h1>

    <div class="bg-white p-6 rounded shadow space-y-3">
        <div>
            <strong>Nama:</strong> {{ $walikelas->nama }}
        </div>
        <div>
            <strong>NIP:</strong> {{ $walikelas->nip }}
        </div>
        <div>
            <strong>Kelas:</strong> {{ $walikelas->kelas->nama_kelas ?? '-' }}
        </div>

        <a href="{{ route('wali_kelas.profil.edit') }}"
           class="inline-block mt-4 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800">
            Edit Profil
        </a>
    </div>
</div>
@endsection
