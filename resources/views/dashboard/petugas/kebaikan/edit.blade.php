@extends('dashboard.petugas.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-8 mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">Edit Jenis Kebaikan</h1>
            <p class="text-green-100">Perbarui informasi jenis kebaikan dan prestasi siswa</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('kebaikan.index') }}" 
               class="bg-white text-green-600 hover:bg-green-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
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
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Perbarui Informasi Kebaikan</h2>
        <p class="text-gray-600">Edit form di bawah ini untuk memperbarui data jenis kebaikan</p>
    </div>

    <form action="{{ route('kebaikan.update', $kebaikan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Kebaikan -->
            <div class="md:col-span-2">
                <label for="nama_kebaikan" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Kebaikan <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama_kebaikan" 
                       name="nama_kebaikan" 
                       required
                       value="{{ old('nama_kebaikan', $kebaikan->nama_kebaikan) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                       placeholder="Contoh: Membantu teman">
                @error('nama_kebaikan')
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
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-white">
                    <option value="">Pilih Kategori</option>
                    <option value="kecil" {{ old('kategori', $kebaikan->kategori) == 'kecil' ? 'selected' : '' }}>Kecil</option>
                    <option value="sedang" {{ old('kategori', $kebaikan->kategori) == 'sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="besar" {{ old('kategori', $kebaikan->kategori) == 'besar' ? 'selected' : '' }}>Besar</option>
                </select>
                @error('kategori')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Poin -->
            <div>
                <label for="poin" class="block text-sm font-medium text-gray-700 mb-2">
                    Poin <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">+</span>
                    </div>
                    <input type="number" 
                           id="poin" 
                           name="poin" 
                           required
                           min="1"
                           value="{{ old('poin', $kebaikan->poin) }}"
                           class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
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
              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
              placeholder="Jelaskan tentang jenis kebaikan ini">{{ old('deskripsi', $kebaikan->deskripsi) }}</textarea>
    @error('deskripsi')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
</div>

<!-- Info Kategori -->
<div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
<div class="flex">
    <svg class="w-5 h-5 text-blue-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
    </svg>
    <div class="ml-3">
        <h3 class="text-sm font-medium text-blue-800">Informasi Kategori</h3>
        <div class="mt-2 text-sm text-blue-700">
            <ul class="list-disc pl-5 space-y-1">
                <li><span class="font-medium">Kecil:</span> Kebaikan sehari-hari seperti membantu teman, membersihkan kelas, dll.</li>
                <li><span class="font-medium">Sedang:</span> Kebaikan yang lebih signifikan seperti menjadi panitia acara, dll.</li>
                <li><span class="font-medium">Besar:</span> Prestasi luar biasa seperti juara kompetisi tingkat kabupaten/provinsi, dll.</li>
            </ul>
        </div>
    </div>
</div>
</div>

<!-- Buttons -->
<div class="mt-8 flex justify-end space-x-4">
<a href="{{ route('kebaikan.index') }}" 
   class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors font-medium inline-flex items-center">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
    Batal
</a>
<button type="submit" 
        class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors font-medium inline-flex items-center">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
    </svg>
    Update Perubahan
</button>
</div>
</form>
</div>
@endsection