@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-8 mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">Master Data Kelas</h1>
            <p class="text-white/90">Kelola data kelas, jurusan, dan tingkat</p>
        </div>
        <div class="mt-4 md:mt-0 flex flex-col sm:flex-row gap-3">
            <button onclick="openImportModal()"
                    class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
                Import Kelas
            </button>
            <a href="{{ route('datakelas.create') }}" 
               class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Kelas
            </a>
        </div>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6 animate-slide-down">
    <div class="flex items-center">
        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <p class="ml-3 text-sm text-green-700">{{ session('success') }}</p>
    </div>
</div>
@endif

<!-- Data Table Card -->
<div class="bg-white rounded-xl shadow overflow-hidden border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-800">Daftar Kelas</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-16">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Kelas</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Tingkat</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jurusan</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($kelas as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-center">
                        <span class="text-sm text-gray-600 font-medium">{{ $loop->iteration }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0 rounded-lg bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white font-bold text-sm">
                                {{ substr($item->nama_kelas, 0, 2) }}
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $item->nama_kelas }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($item->tingkat == 'X')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Kelas X
                        </span>
                        @elseif($item->tingkat == 'XI')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Kelas XI
                        </span>
                        @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            Kelas XII
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 font-medium">{{ $item->jurusan }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('datakelas.edit', $item->id) }}" 
                               class="text-indigo-600 hover:text-indigo-900 p-2 hover:bg-indigo-50 rounded-lg transition-colors"
                               title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button onclick="openDeleteModal({{ $item->id }})"
                                    class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition-colors"
                                    title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-16 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data kelas</h3>
                        <p class="text-gray-500 mb-6">Mulai dengan menambahkan kelas baru</p>
                        <button onclick="openImportModal()"
                                class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-primary to-purple-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            Import Kelas
                        </button>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 text-center border border-gray-100 m-4 animate-scale-up">
        <div class="mx-auto mb-4 h-14 w-14 rounded-full bg-red-50 flex items-center justify-center">
            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 7V4h6v3M4 7h16"/>
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Konfirmasi Penghapusan</h3>
        <p class="text-sm text-gray-500 mb-6">
            Data <span class="text-red-500 font-medium">akan dihapus permanen</span> dan tidak bisa dikembalikan.
        </p>
        <div class="flex justify-center gap-3">
            <button onclick="closeDeleteModal()"
                    class="px-5 py-2.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition-colors">
                Batal
            </button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button class="px-5 py-2.5 rounded-lg bg-red-500 hover:bg-red-600 text-white font-medium shadow-md transition-all duration-200 hover:shadow-lg">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div id="importModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">
    <div class="bg-white w-full max-w-3xl rounded-2xl shadow-2xl border border-gray-100 overflow-hidden animate-scale-up max-h-[90vh] flex flex-col">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-primary to-purple-600 px-6 py-4 flex-shrink-0">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="h-10 w-10 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Import Data Kelas</h2>
                        <p class="text-white/80 text-sm">Unggah file Excel untuk menambahkan data</p>
                    </div>
                </div>
                <button onclick="closeImportModal()" 
                        class="text-white/80 hover:text-white transition-colors p-1.5 hover:bg-white/10 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body - Scrollable -->
        <div class="flex-1 overflow-y-auto p-6">
            <!-- Success Notification -->
            @if(session('success'))
            <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg flex items-start gap-3 animate-slide-down">
                <div class="flex-shrink-0 w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-emerald-800 text-sm">Import Berhasil!</p>
                    <p class="text-xs text-emerald-600 mt-0.5">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            @endif

            <!-- Error Notification -->
            @if(session('error'))
            <div class="mb-4 p-3 bg-rose-50 border border-rose-200 rounded-lg flex items-start gap-3 animate-slide-down">
                <div class="flex-shrink-0 w-6 h-6 bg-rose-100 rounded-full flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-rose-800 text-sm">Terjadi Kesalahan!</p>
                    <p class="text-xs text-rose-600 mt-0.5">{{ session('error') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-rose-400 hover:text-rose-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            @endif

            <form action="{{ route('datakelas.import.store') }}" method="POST" enctype="multipart/form-data" id="importForm" class="space-y-4">
                @csrf

                <!-- File Upload Area -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Pilih File Excel <span class="text-rose-500">*</span>
                    </label>
                    
                    <div class="relative">
                        <input type="file" name="file" id="fileInput" class="hidden" accept=".xlsx,.xls" required>
                        <label for="fileInput" id="dropZone" class="flex flex-col items-center justify-center w-full h-36 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gradient-to-br from-gray-50 to-white hover:from-indigo-50 hover:to-purple-50 hover:border-primary transition-all duration-300 group">
                            <div class="mb-2">
                                <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-primary/10 to-purple-500/10 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-primary group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">
                                <span class="text-primary">Klik untuk memilih file</span> atau drag & drop
                            </p>
                            <p class="text-xs text-gray-500">Format: .xlsx, .xls (Max 5MB)</p>
                        </label>
                    </div>
                    
                    <!-- File Info -->
                    <div id="fileInfo" class="mt-3 hidden">
                        <div class="flex items-center justify-between p-3 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg border border-indigo-200">
                            <div class="flex items-center space-x-2.5">
                                <div class="h-9 w-9 rounded-lg bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p id="fileNameDisplay" class="text-sm font-semibold text-gray-900"></p>
                                    <p id="fileSize" class="text-xs text-gray-600"></p>
                                </div>
                            </div>
                            <button type="button" onclick="removeFile()" 
                                    class="text-gray-400 hover:text-rose-500 transition-colors p-1.5 hover:bg-white/50 rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    @error('file')
                    <p class="mt-1.5 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Template Download & Instructions in 2 columns -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Template Download -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-blue-200">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-md">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-gray-900 mb-1">Template Excel</h4>
                                <p class="text-xs text-gray-600 mb-2">Download format yang benar</p>
                                <a href="#" class="inline-flex items-center text-xs text-primary hover:text-purple-700 font-semibold transition-colors">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-lg p-4 border border-gray-200">
                        <h4 class="text-sm font-bold text-gray-900 mb-2 flex items-center">
                            <div class="h-5 w-5 rounded-md bg-primary/10 flex items-center justify-center mr-1.5">
                                <svg class="w-3 h-3 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            Petunjuk Import
                        </h4>
                        <ul class="space-y-1.5 text-xs text-gray-600">
                            <li class="flex items-start space-x-2">
                                <span class="h-4 w-4 rounded-full bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-[10px] font-bold text-white">1</span>
                                </span>
                                <span>Kolom: <code class="bg-gray-200 px-1.5 py-0.5 rounded text-[10px]">nama_kelas</code>, <code class="bg-gray-200 px-1.5 py-0.5 rounded text-[10px]">tingkat</code>, <code class="bg-gray-200 px-1.5 py-0.5 rounded text-[10px]">jurusan</code></span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <span class="h-4 w-4 rounded-full bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-[10px] font-bold text-white">2</span>
                                </span>
                                <span>Tingkat: <code class="bg-gray-200 px-1.5 py-0.5 rounded text-[10px]">X</code>, <code class="bg-gray-200 px-1.5 py-0.5 rounded text-[10px]">XI</code>, <code class="bg-gray-200 px-1.5 py-0.5 rounded text-[10px]">XII</code></span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <span class="h-4 w-4 rounded-full bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-[10px] font-bold text-white">3</span>
                                </span>
                                <span>Max: <code class="bg-gray-200 px-1.5 py-0.5 rounded text-[10px]">5MB</code></span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div id="progressContainer" class="hidden">
                    <div class="mb-2 flex justify-between items-center text-sm">
                        <span class="text-gray-700 font-semibold flex items-center text-xs">
                            <svg class="animate-spin h-3.5 w-3.5 mr-1.5 text-primary" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Sedang mengunggah...
                        </span>
                        <span id="progressPercent" class="font-bold text-primary text-xs">0%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden shadow-inner">
                        <div id="progressBar" class="bg-gradient-to-r from-primary via-purple-500 to-purple-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-3 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3 flex-shrink-0">
            <button onclick="closeImportModal()" 
                    class="px-5 py-2 rounded-lg border-2 border-gray-300 text-gray-700 hover:bg-gray-100 font-semibold text-sm transition-all duration-200">
                Batal
            </button>
            <button type="submit" form="importForm" id="submitBtn" 
                    class="px-6 py-2 rounded-lg bg-gradient-to-r from-primary to-purple-600 text-white font-semibold text-sm hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 flex items-center">
                <svg id="submitIcon" class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                </svg>
                <span id="submitText">Import Data</span>
            </button>
        </div>
    </div>
</div>

<style>
@keyframes slide-down {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scale-up {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-slide-down {
    animation: slide-down 0.3s ease-out;
}

.animate-scale-up {
    animation: scale-up 0.3s ease-out;
}

#dropZone.dragover {
    border-color: #4f46e5;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 100%);
    transform: scale(1.02);
}
</style>

<script>
// Modal Functions
function openImportModal() {
    document.getElementById('importModal').classList.remove('hidden');
    document.getElementById('importModal').classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeImportModal() {
    document.getElementById('importModal').classList.add('hidden');
    document.getElementById('importModal').classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
    resetForm();
}

function openDeleteModal(id) {
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
    document.getElementById('deleteForm').action = `/admin/datakelas/${id}`;
    document.body.classList.add('overflow-hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.getElementById('deleteModal').classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

// Close modals on outside click
window.onclick = function(event) {
    const importModal = document.getElementById('importModal');
    const deleteModal = document.getElementById('deleteModal');
    
    if (event.target === importModal) {
        closeImportModal();
    }
    if (event.target === deleteModal) {
        closeDeleteModal();
    }
}

// Close modals on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeImportModal();
        closeDeleteModal();
    }
});

// File Upload Handling
const fileInput = document.getElementById('fileInput');
const dropZone = document.getElementById('dropZone');
const fileInfo = document.getElementById('fileInfo');
const fileNameDisplay = document.getElementById('fileNameDisplay');
const fileSize = document.getElementById('fileSize');
const progressContainer = document.getElementById('progressContainer');
const progressBar = document.getElementById('progressBar');
const progressPercent = document.getElementById('progressPercent');
const submitBtn = document.getElementById('submitBtn');
const submitText = document.getElementById('submitText');
const submitIcon = document.getElementById('submitIcon');

fileInput.addEventListener('change', handleFileSelect);

function handleFileSelect(e) {
    const file = e.target.files[0];
    if (file) {
        showFileInfo(file);
    }
}

function showFileInfo(file) {
    const size = (file.size / 1024 / 1024).toFixed(2);
    fileNameDisplay.textContent = file.name;
    fileSize.textContent = `${size} MB`;
    fileInfo.classList.remove('hidden');
    fileInfo.classList.add('animate-slide-down');
}

function removeFile() {
    fileInput.value = '';
    fileInfo.classList.add('hidden');
}

// Drag and drop
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, unhighlight, false);
});

function highlight() {
    dropZone.classList.add('dragover');
}

function unhighlight() {
    dropZone.classList.remove('dragover');
}

dropZone.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    
    if (files.length > 0) {
        fileInput.files = files;
        handleFileSelect({ target: { files: files } });
    }
}

// Form submission
document.getElementById('importForm').addEventListener('submit', function(e) {
    const file = fileInput.files[0];
    if (!file) {
        e.preventDefault();
        alert('Silakan pilih file terlebih dahulu');
        return;
    }

    progressContainer.classList.remove('hidden');
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    submitText.textContent = 'Mengunggah...';
    submitIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>';

    let progress = 0;
    const interval = setInterval(() => {
        progress += 10;
        if (progress > 90) {
            clearInterval(interval);
            return;
        }
        updateProgress(progress);
    }, 100);
});

function updateProgress(percent) {
    progressBar.style.width = percent + '%';
    progressPercent.textContent = percent + '%';
}

function resetForm() {
    fileInput.value = '';
    fileInfo.classList.add('hidden');
    progressContainer.classList.add('hidden');
    progressBar.style.width = '0%';
    progressPercent.textContent = '0%';
    submitBtn.disabled = false;
    submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    submitText.textContent = 'Import Data';
    submitIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>';
}
</script>
@endsection