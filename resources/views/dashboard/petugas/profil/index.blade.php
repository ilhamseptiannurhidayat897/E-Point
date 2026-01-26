@extends('dashboard.petugas.main')

@section('content')

<div class="bg-white rounded-2xl shadow-lg border border-gray-100 max-w-4xl mx-auto">

    <!-- Header -->
    <div class="flex items-center gap-4 p-6 border-b">
        <div class="w-14 h-14 rounded-full bg-gradient-to-r from-primary to-purple-600 flex items-center justify-center text-white font-bold text-xl">
            {{ substr($petugas->nama, 0, 1) }}
        </div>

        <div class="flex-1">
            <h2 class="font-semibold text-gray-800">{{ $petugas->nama }}</h2>
            <p class="text-sm text-gray-500">Petugas</p>
        </div>

        <a href="{{ route('dashboard.petugas') }}"
           class="text-gray-400 hover:text-gray-600">
            <i class="fas fa-times"></i>
        </a>
    </div>

    <!-- Info -->
    <div class="divide-y">
        <div class="flex justify-between items-center px-6 py-4">
            <span class="text-sm text-gray-500">Nama</span>
            <span class="font-medium text-gray-800">{{ $petugas->nama }}</span>
        </div>

        <div class="flex justify-between items-center px-6 py-4">
            <span class="text-sm text-gray-500">Nomor Kepegawaian</span>
            <span class="font-medium text-gray-800">{{ $petugas->nk }}</span>
        </div>

        <div class="flex justify-between items-center px-6 py-4">
            <span class="text-sm text-gray-500">Role</span>
            <span class="font-medium text-gray-800">Petugas</span>
        </div>
    </div>

    <!-- Security Section -->
    <div class="px-6 pt-4">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 
                    border border-primary/20 rounded-xl p-5">
            <div class="flex items-start gap-3">
                <i class="fas fa-shield-alt text-primary mt-1"></i>
                <div>
                    <h4 class="font-semibold text-gray-800 mb-2">Keamanan Akun</h4>
                    <p class="text-sm text-gray-600 mb-3">
                        Pastikan password Anda aman dan tidak dibagikan kepada siapa pun.
                    </p>
                    <ul class="text-xs text-gray-600 space-y-1">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check text-primary text-xs"></i>
                            <span>Gunakan kombinasi huruf, angka, dan simbol</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check text-primary text-xs"></i>
                            <span>Minimal 8 karakter untuk keamanan optimal</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Action -->
    <div class="p-6 pt-5">
        <a href="{{ route('petugas.profil.edit') }}"
           class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 
                  text-white px-6 py-3 rounded-xl font-semibold transition">
            <i class="fas fa-key"></i>
            Ubah Password
        </a>
    </div>

</div>

@endsection
