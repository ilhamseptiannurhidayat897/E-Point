@extends('dashboard.petugas.main')

@section('content')

<div class="max-w-4xl mx-auto">

    <!-- SINGLE CARD -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">

        <!-- Header -->
        <div class="flex items-center justify-between p-6 border-b">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-primary to-purple-600 flex items-center justify-center text-white">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-gray-800">
                        Keamanan Akun
                    </h1>
                    <p class="text-sm text-gray-500">
                        Ubah password untuk menjaga keamanan akun petugas
                    </p>
                </div>
            </div>

            <!-- Close Button -->
            <a href="{{ route('petugas.profil.index') }}"
               class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-gray-100 transition">
                <i class="fas fa-times text-gray-500"></i>
            </a>
        </div>

        <!-- Error -->
        @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 m-6">
            <ul class="text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('petugas.profil.update') }}" method="POST">
            @csrf

            <div class="p-6 space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password Lama
                    </label>
                    <input type="password" name="password_lama"
                           placeholder="Masukkan password lama"
                           class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password Baru
                    </label>
                    <input type="password" name="password_baru"
                           placeholder="Password baru"
                           class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Konfirmasi Password Baru
                    </label>
                    <input type="password" name="password_baru_confirmation"
                           placeholder="Ulangi password baru"
                           class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-primary focus:outline-none">
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('petugas.profil.index') }}"
                       class="px-6 py-3 border rounded-xl font-semibold text-gray-700 hover:bg-gray-50 transition">
                        Batal
                    </a>

                    <button
                        class="px-6 py-3 flex items-center gap-2 bg-gradient-to-r from-primary to-purple-600 text-white rounded-xl font-semibold shadow hover:opacity-90 transition">
                        <i class="fas fa-lock"></i>
                        Ubah Password
                    </button>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection
