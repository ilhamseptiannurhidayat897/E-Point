@extends('dashboard.wali_kelas.main')

@section('content')

<div class="max-w-4xl mx-auto">

    <!-- SINGLE CARD -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">

        <!-- Header -->
        <div class="flex items-center justify-between p-6 border-b">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-primary to-purple-600 flex items-center justify-center text-white">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-gray-800">
                        Profil Wali Kelas
                    </h1>
                    <p class="text-sm text-gray-500">
                        Informasi akun wali kelas
                    </p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6 space-y-4 text-sm text-gray-700">

            <div class="flex justify-between border-b pb-3">
                <span class="font-semibold text-gray-600">Nama</span>
                <span>{{ $walikelas->nama }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-semibold text-gray-600">NIP</span>
                <span>{{ $walikelas->nip }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Kelas</span>
                <span>{{ $walikelas->kelas->nama_kelas ?? '-' }}</span>
            </div>

            <!-- Action -->
            <div class="pt-6 flex justify-end">
                <a href="{{ route('wali_kelas.profil.edit') }}"
                   class="px-6 py-3 flex items-center gap-2 bg-gradient-to-r from-primary to-purple-600 text-white rounded-xl font-semibold shadow hover:opacity-90 transition">
                    <i class="fas fa-edit"></i>
                    Edit Profil
                </a>
            </div>

        </div>

    </div>
</div>

@endsection
