@extends('dashboard.petugas.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-purple-600 to-indigo-700 rounded-xl p-8 mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">Edit Jenis Pelanggaran</h1>
            <p class="text-purple-100">Perbarui informasi jenis pelanggaran dan aturan siswa</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('pelanggaran.index') }}" 
               class="bg-white text-purple-600 hover:bg-purple-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>

<!-- Form Section -->
<div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Perbarui Informasi Pelanggaran</h2>
        <p class="text-gray-600">Edit form di bawah ini untuk memperbarui data jenis pelanggaran</p>
    </div>

    <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Pelanggaran -->
            <div class="md:col-span-2">
                <label for="nama_pelanggaran" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Pelanggaran <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama_pelanggaran" 
                       name="nama_pelanggaran" 
                       required
                       value="{{ old('nama_pelanggaran', $pelanggaran->nama_pelanggaran) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                       placeholder="Contoh: Terlambat datang ke sekolah">
                @error('nama_pelanggaran')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                    Kategori <span class="text-red-500">*</span>
                </label>
                <select id="kategori" 
                        name="kategori" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white">
                    <option value="">Pilih Kategori</option>
                    <option value="ringan" {{ old('kategori', $pelanggaran->kategori) == 'ringan' ? 'selected' : '' }}>Ringan</option>
                    <option value="sedang" {{ old('kategori', $pelanggaran->kategori) == 'sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="berat" {{ old('kategori', $pelanggaran->kategori) == 'berat' ? 'selected' : '' }}>Berat</option>
                </select>
                @error('kategori')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Poin -->
            <div>
                <label for="poin" class="block text-sm font-medium text-gray-700 mb-2">
                    Poin Pengurangan <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">-</span>
                    </div>
                    <input type="number" 
                           id="poin" 
                           name="poin" 
                           required
                           min="1"
                           value="{{ old('poin', $pelanggaran->poin) }}"
                           class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           placeholder="0">
                </div>
                @error('poin')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kode -->
                 <!-- Deskripsi -->
                 <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi <span class="text-gray-400 text-xs">(Opsional)</span>
                    </label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                              placeholder="Jelaskan tentang jenis pelanggaran ini">{{ old('deskripsi', $pelanggaran->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
    
            <!-- Info Kategori -->
            <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                <div class="flex">
                    <svg class="w-5 h-5 text-yellow-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Informasi Kategori Pelanggaran</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <ul class="list-disc pl-5 space-y-1">
                                <li><span class="font-medium">Ringan:</span> Pelanggaran kecil seperti tidak membawa tugas, seragam tidak rapi, dll.</li>
                                <li><span class="font-medium">Sedang:</span> Pelanggaran yang lebih serius seperti terlambat, meninggalkan jam pelajaran, dll.</li>
                                <li><span class="font-medium">Berat:</span> Pelanggaran sangat serius seperti bolos, bertengkar, merusak fasilitas, dll.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('pelanggaran.index') }}" 
                   class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors font-medium inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors font-medium inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Update Perubahan
                </button>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-generate code based on name
        const nameInput = document.getElementById('nama_pelanggaran');
        const codeInput = document.getElementById('code');
        
        nameInput.addEventListener('input', function() {
            if (!codeInput.value) {
                // Generate simple code from name
                const name = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
                if (name.length > 0) {
                    codeInput.value = 'PL' + name.substring(0, 3) + Math.floor(Math.random() * 100);
                }
            }
        });
        
        // Adjust poin based on category
        const kategoriSelect = document.getElementById('kategori');
        const poinInput = document.getElementById('poin');
        
        kategoriSelect.addEventListener('change', function() {
            if (!poinInput.value) {
                switch(this.value) {
                    case 'ringan':
                        poinInput.value = 5;
                        break;
                    case 'sedang':
                        poinInput.value = 15;
                        break;
                    case 'berat':
                        poinInput.value = 30;
                        break;
                    default:
                        poinInput.value = '';
                }
            }
        });
    });
    </script>
    @endsection