@extends('dashboard.bk.main')

@section('content')

<!-- Header -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">
            Profil Saya
        </h1>
        <a href="{{ route('bk.dashboard') }}" 
           class="flex items-center gap-2 text-primary hover:text-purple-600 font-semibold transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
</div>

<!-- Success Alert -->
@if (session('success'))
<div class="bg-gradient-to-r from-primary/10 to-purple-600/10 border border-primary/20 text-primary rounded-xl p-4 mb-6 flex items-center gap-3">
    <i class="fas fa-check-circle"></i>
    <p class="font-medium">{{ session('success') }}</p>
</div>
@endif

<!-- Profile Content -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden max-w-2xl mx-auto">
    
    <!-- Header Profile -->
    <div class="bg-gradient-to-r from-primary to-purple-600 px-8 py-10 relative">
        <div class="flex items-center gap-6">
            <div class="w-20 h-20 bg-white rounded-xl flex items-center justify-center shadow-lg">
                <span class="text-3xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">
                    {{ substr($bk->nama, 0, 1) }}
                </span>
            </div>
            <div class="text-white">
                <p class="text-sm text-white/80 mb-1">Bimbingan Konseling</p>
                <h2 class="text-2xl font-bold">{{ $bk->nama }}</h2>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="p-8">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Informasi Akun</h3>

        <div class="space-y-4 mb-8">
            
            <!-- Nama -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="text-xs text-gray-500 mb-1">Nama Lengkap</p>
                    <p class="font-semibold text-gray-800">{{ $bk->nama }}</p>
                </div>
            </div>

            <!-- NIP -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-id-badge text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="text-xs text-gray-500 mb-1">Nomor Induk Pegawai</p>
                    <p class="font-semibold text-gray-800">{{ $bk->nip ?? '-' }}</p>
                </div>
            </div>

            <!-- Role -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-tie text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="text-xs text-gray-500 mb-1">Role</p>
                    <p class="font-semibold text-gray-800">Bimbingan Konseling</p>
                </div>
            </div>

        </div>

        <!-- Security Info -->
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 border border-primary/20 rounded-xl p-5 mb-6">
            <div class="flex items-start gap-3">
                <i class="fas fa-shield-alt text-primary mt-0.5"></i>
                <div>
                    <h4 class="font-semibold text-gray-800 mb-2">Keamanan Akun</h4>
                    <p class="text-sm text-gray-600 mb-3">Pastikan password Anda aman dan tidak dibagikan kepada siapa pun.</p>
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

        <!-- Action Button -->
        <a href="{{ route('bk.profil.edit') }}"
           class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-primary to-purple-600 hover:from-purple-600 hover:to-primary text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
            <i class="fas fa-key"></i>
            <span>Ubah Password</span>
        </a>
    </div>

</div>

@endsection