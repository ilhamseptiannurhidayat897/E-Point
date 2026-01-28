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
            <a href="{{ route('wali_kelas.profil.edit') }}"
               class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 
                      text-white px-6 py-3 rounded-xl font-semibold transition">
                <i class="fas fa-edit"></i>
                Edit Profil
            </a>
        </div>
    </div>
</div>

@endsection
