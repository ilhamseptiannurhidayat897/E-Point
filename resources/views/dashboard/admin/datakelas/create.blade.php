@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-8 mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">Tambah Kelas Baru</h1>
            <p class="text-green-100">Formulir penambahan data kelas baru</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('datakelas.index') }}" 
               class="bg-white/20 backdrop-blur text-white hover:bg-white/30 px-6 py-3 rounded-lg font-semibold inline-flex items-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>

<!-- Error Messages -->
@if($errors->any())
<div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
    <div class="flex">
        <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
        </svg>
        <div class="ml-3">
            <p class="text-sm text-red-700 font-medium">Terdapat kesalahan pada formulir:</p>
            <ul class="mt-2 text-sm text-red-700">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<!-- Form Card -->
<div class="bg-white rounded-xl shadow overflow-hidden border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-800">Informasi Kelas</h2>
    </div>
    
    <form method="POST" action="{{ route('datakelas.store') }}" class="p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Tingkat -->
            <div>
                <label for="tingkat" class="block text-sm font-medium text-gray-700 mb-2">
                    Tingkat Kelas
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <select id="tingkat" name="tingkat" 
                            class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent appearance-none bg-white"
                            required>
                        <option value="">Pilih Tingkat</option>
                        <option value="X" {{ old('tingkat') == 'X' ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ old('tingkat') == 'XI' ? 'selected' : '' }}>XI</option>
                        <option value="XII" {{ old('tingkat') == 'XII' ? 'selected' : '' }}>XII</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-1 text-sm text-gray-500">Pilih tingkat kelas</p>
            </div>
            
            <!-- Jurusan -->
            <div>
                <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-2">
                    Jurusan
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <select id="jurusan" name="jurusan" 
                            class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent appearance-none bg-white"
                            required>
                        <option value="">Pilih Jurusan</option>
                        <option value="TO" {{ old('jurusan') == 'TO' ? 'selected' : '' }}>Teknik Otomotif (TO)</option>
                        <option value="TJKT" {{ old('jurusan') == 'TJKT' ? 'selected' : '' }}>Teknik Jaringan Komputer & Telekomunikasi (TJKT)</option>
                        <option value="DPIB" {{ old('jurusan') == 'DPIB' ? 'selected' : '' }}>Desain Pemodelan dan Informasi Bangunan (DPIB)</option>
                        <option value="MPLB" {{ old('jurusan') == 'MPLB' ? 'selected' : '' }}>Manajemen Perkantoran dan Layanan Bisnis (MPLB)</option>
                        <option value="AKL" {{ old('jurusan') == 'AKL' ? 'selected' : '' }}>Akuntansi dan Keuangan Lembaga (AKL)</option>
                        <option value="SP" {{ old('jurusan') == 'SP' ? 'selected' : '' }}>Seni Pertunjukan (SP)</option>
                        <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>Rekayasa Perangkat Lunak (RPL)</option>
                        <option value="GIM" {{ old('jurusan') == 'GIM' ? 'selected' : '' }}>Pengembangan Gim (GIM)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-1 text-sm text-gray-500">Pilih jurusan untuk kelas</p>
            </div>
            
            <!-- Nomor Kelas -->
            <!-- ... bagian atas form tetap sama ... -->

<!-- Nomor Kelas -->
<div>
    <label for="nomor" class="block text-sm font-medium text-gray-700 mb-2">
        Nomor Kelas
    </label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
            </svg>
        </div>
        <input type="number" 
               id="nomor" 
               name="nomor" 
               value="{{ old('nomor') }}"
               class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
               placeholder="Opsional, kosongkan jika tidak ada"
               min="1"
               max="20">
               <!-- HAPUS ATRIBUT "required" -->
    </div>
    <p class="mt-1 text-sm text-gray-500">Nomor urut kelas (opsional, 1-20)</p>
</div>

<!-- ... bagian preview dan tombol tetap sama ... -->
        <!-- Preview Nama Kelas -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
            <p class="text-sm font-medium text-gray-700 mb-2">Preview Nama Kelas:</p>
            <div id="preview" class="text-lg font-bold text-primary">-</div>
        </div>
        
        <!-- Buttons -->
        <div class="mt-8 flex justify-end space-x-3">
            <a href="{{ route('datakelas.index') }}" 
               class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors font-medium inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Batal
            </a>
            <button type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-primary to-purple-700 hover:from-primary/90 hover:to-purple-700/90 text-white rounded-lg transition-all font-medium inline-flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Kelas
            </button>
        </div>
    </form>
</div>

<script>
    // Preview nama kelas
    function updatePreview() {
        const tingkat = document.getElementById('tingkat').value;
        const jurusan = document.getElementById('jurusan').value;
        const nomor = document.getElementById('nomor').value;
        const preview = document.getElementById('preview');
        
        if (tingkat && jurusan) {
            let jurusanShort = jurusan;
            if (jurusan === 'TJKT') jurusanShort = 'TJKT';
            else if (jurusan === 'DPIB') jurusanShort = 'DPIB';
            else if (jurusan === 'MPLB') jurusanShort = 'MPLB';
            else if (jurusan === 'AKL') jurusanShort = 'AKL';
            else if (jurusan === 'SP') jurusanShort = 'SP';
            let namaPreview = `${tingkat} ${jurusanShort}`;
            
            // Tambahkan nomor hanya jika ada nilainya
            if (nomor) {
                namaPreview += ` ${nomor}`;
            }
            
            preview.textContent = namaPreview;
        } else {
            preview.textContent = '-';
        }
    }
    
    document.getElementById('tingkat').addEventListener('change', updatePreview);
    document.getElementById('jurusan').addEventListener('change', updatePreview);
    document.getElementById('nomor').addEventListener('input', updatePreview);
    
    // Initialize preview
    updatePreview();
    </script>
@endsection