@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-4 md:p-6 lg:p-8 mb-6 md:mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-1 md:mb-2">Tambah Siswa Baru</h1>
            <p class="text-sm md:text-base text-purple-200">Isi formulir untuk menambahkan data siswa</p>
        </div>
        <div class="w-full md:w-auto">
            <a href="{{ route('datasiswa.index') }}" 
               class="w-full md:w-auto bg-white text-primary hover:bg-gray-50 px-4 md:px-6 py-2 md:py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>
</div>

<!-- Form Section -->
<div class="bg-white rounded-xl shadow-sm p-4 md:p-6 lg:p-8 border border-gray-100">
    <div class="mb-6">
        <h2 class="text-base md:text-lg font-semibold text-gray-800 mb-2">Informasi Siswa</h2>
        <p class="text-sm md:text-base text-gray-600">Lengkapi data siswa dengan benar</p>
    </div>

    <form action="{{ route('datasiswa.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <!-- NIS Field -->
            <div>
                <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">
                    Nomor Induk Siswa (NIS) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                        </svg>
                    </div>
                    <input type="text" 
                           id="nis" 
                           name="nis" 
                           required
                           value="{{ old('nis') }}"
                           class="w-full pl-10 pr-4 py-2.5 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm md:text-base"
                           placeholder="Masukkan NIS">
                </div>
                @error('nis')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Nama Field -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           required
                           value="{{ old('nama') }}"
                           class="w-full pl-10 pr-4 py-2.5 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm md:text-base"
                           placeholder="Masukkan nama lengkap">
                </div>
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Jenis Kelamin Field -->
            <div>
                <label for="jk" class="block text-sm font-medium text-gray-700 mb-2">
                    Jenis Kelamin <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <select id="jk" 
                            name="jk" 
                            required
                            class="w-full pl-10 pr-4 py-2.5 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm md:text-base appearance-none bg-white">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
                @error('jk')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Kelas Field -->
            <div>
                <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Kelas <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <select id="kelas_id" 
                            name="kelas_id" 
                            required
                            class="w-full pl-10 pr-4 py-2.5 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm md:text-base appearance-none bg-white">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
                @error('kelas_id')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <!-- Alamat Field -->
        <div class="mt-6">
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                Alamat
            </label>
            <div class="relative">
                <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <textarea id="alamat" 
                          name="alamat" 
                          rows="3"
                          class="w-full pl-10 pr-4 py-2.5 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm md:text-base resize-none"
                          placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
            </div>
            @error('alamat')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Info Box -->
        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="flex">
                <svg class="w-5 h-5 text-blue-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">Informasi</h3>
                    <div class="mt-2 text-sm text-blue-700">
                        Pastikan data yang dimasukkan sudah benar dan sesuai dengan data resmi. NIS harus unik dan tidak boleh sama dengan siswa lain.
                    </div>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('datasiswa.index') }}" 
               class="px-4 md:px-6 py-2.5 md:py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors font-medium inline-flex items-center text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Batal
            </a>
            <button type="submit" 
                    class="px-4 md:px-6 py-2.5 md:py-3 bg-primary hover:bg-purple-700 text-white rounded-lg transition-colors font-medium inline-flex items-center text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection