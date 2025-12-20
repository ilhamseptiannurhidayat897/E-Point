@extends('dashboard.guru.main')

@section('content')
<main class="flex-1 overflow-y-auto p-6 bg-gray-50">
<!-- Page Header -->
<div class="mb-6">
    <div class="flex items-center mb-4">
        <a href="{{ route('datasiswa.index') }}" class="text-gray-500 hover:text-primary mr-3 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Data Siswa</h1>
            <p class="text-gray-600 mt-1">Isi form berikut untuk menambahkan siswa baru</p>
        </div>
    </div>
    
    <!-- Progress Indicator -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-700">Progress Pengisian Form</span>
            <span id="progress-percentage" class="text-sm font-medium text-primary">0%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div id="progress-bar" class="bg-primary h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
        </div>
    </div>
</div>

<!-- Form Container -->
<div class="bg-white rounded-xl shadow overflow-hidden border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
        <h2 class="text-lg font-semibold text-gray-800">Informasi Siswa</h2>
        <p class="text-sm text-gray-500 mt-1">Pastikan semua data yang diisi sudah benar</p>
    </div>
    
    <!-- Error Summary -->
    @if ($errors->any())
    <div class="px-6 py-4 bg-red-50 border-b border-red-100">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-red-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">
                    Terdapat {{ $errors->count() }} kesalahan pada form
                </h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <form id="student-form" action="{{ route('datasiswa.store') }}" method="POST" class="p-6 md:p-8">
        @csrf
        
        <!-- Informasi Pribadi Section -->
        <div class="mb-8">
            <h3 class="text-base font-semibold text-gray-900 mb-4 flex items-center">
                <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mr-2">
                    <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                Informasi Pribadi
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- NIS Field -->
                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Induk Siswa <span class="text-red-500">*</span>
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
                               value="{{ old('nis') }}"
                               placeholder="Masukkan NIS siswa" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('nis') border-red-300 @enderror"
                               required>
                    </div>
                    @error('nis')
                        <span class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </span>
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
                               value="{{ old('nama') }}"
                               placeholder="Masukkan nama lengkap siswa" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('nama') border-red-300 @enderror"
                               required>
                    </div>
                    @error('nama')
                        <span class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </span>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <select id="jk" 
                                name="jk" 
                                class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all appearance-none bg-white @error('jk') border-red-300 @enderror"
                                required>
                            <option value="" {{ old('jk') == '' ? 'selected' : '' }} disabled>-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    @error('jk')
                        <span class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                
                <!-- Kelas Field -->
                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">
                        Kelas <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <select id="kelas" 
                                name="kelas" 
                                class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all appearance-none bg-white @error('kelas') border-red-300 @enderror"
                                required>
                            <option value="" {{ old('kelas') == '' ? 'selected' : '' }} disabled>-- Pilih Kelas --</option>
                            <option value="X RPL 1" {{ old('kelas') == 'X RPL 1' ? 'selected' : '' }}>X RPL 1</option>
                            <option value="X RPL 2" {{ old('kelas') == 'X RPL 2' ? 'selected' : '' }}>X RPL 2</option>
                            <option value="XI RPL 1" {{ old('kelas') == 'XI RPL 1' ? 'selected' : '' }}>XI RPL 1</option>
                            <option value="XI RPL 2" {{ old('kelas') == 'XI RPL 2' ? 'selected' : '' }}>XI RPL 2</option>
                            <option value="XII RPL 1" {{ old('kelas') == 'XII RPL 1' ? 'selected' : '' }}>XII RPL 1</option>
                            <option value="XII RPL 2" {{ old('kelas') == 'XII RPL 2' ? 'selected' : '' }}>XII RPL 2</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    @error('kelas')
                        <span class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Informasi Tambahan Section -->
        <div class="mb-8">
            <h3 class="text-base font-semibold text-gray-900 mb-4 flex items-center">
                <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mr-2">
                    <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                </div>
                Informasi Tambahan
            </h3>
            
            <div class="grid grid-cols-1 gap-6">
                <!-- Alamat Field -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat Lengkap
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <textarea id="alamat" 
                                  name="alamat" 
                                  rows="4"
                                  placeholder="Masukkan alamat lengkap siswa (opsional)" 
                                  class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none @error('alamat') border-red-300 @enderror">{{ old('alamat') }}</textarea>
                    </div>
                    @error('alamat')
                        <span class="text-red-500 text-xs mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="flex flex-col sm:flex-row sm:justify-end sm:space-x-3 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
            <a href="{{ route('datasiswa.index') }}" 
               class="w-full sm:w-auto px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Batal
            </a>
            <button type="submit" 
                    id="submit-button"
                    class="w-full sm:w-auto px-6 py-3 bg-primary hover:bg-purple-700 text-white rounded-lg font-medium transition-all flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                </svg>
                <span id="submit-text">Simpan Data</span>
                <svg id="loading-spinner" class="hidden animate-spin h-5 w-5 ml-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>
    </form>
</div>

<!-- Info Card -->
<div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-blue-800">Catatan Penting</h3>
            <div class="mt-2 text-sm text-blue-700">
                <ul class="list-disc list-inside space-y-1">
                    <li>Pastikan NIS yang dimasukkan belum terdaftar dalam sistem</li>
                    <li>Data yang bertanda (<span class="text-red-500">*</span>) wajib diisi</li>
                    <li>Nama akan otomatis diformat dengan huruf kapital di awal kata</li>
                    <li>Data akan tersimpan otomatis sebagai draft untuk mencegah kehilangan data</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</main>

<!-- Confirmation Modal -->
<div id="confirmation-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 mb-4">
                <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Apakah Anda yakin ingin meninggalkan halaman ini? Data yang belum disimpan akan hilang.
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="confirm-leave" class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md w-24 mr-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Ya
                </button>
                <button id="cancel-leave" class="px-4 py-2 bg-gray-200 text-gray-800 text-base font-medium rounded-md w-24 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Tidak
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form elements
        const form = document.getElementById('student-form');
        const submitButton = document.getElementById('submit-button');
        const submitText = document.getElementById('submit-text');
        const loadingSpinner = document.getElementById('loading-spinner');
        const progressBar = document.getElementById('progress-bar');
        const progressPercentage = document.getElementById('progress-percentage');
        const confirmationModal = document.getElementById('confirmation-modal');
        const confirmLeaveButton = document.getElementById('confirm-leave');
        const cancelLeaveButton = document.getElementById('cancel-leave');
        
        // Track if form has unsaved changes
        let hasUnsavedChanges = false;
        let formSubmitted = false;
        
        // Required fields for progress calculation
        const requiredFields = ['nis', 'nama', 'jk', 'kelas'];
        
        // Update progress bar
        function updateProgress() {
            let filledFields = 0;
            
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field && field.value.trim() !== '') {
                    filledFields++;
                }
            });
            
            const progress = Math.round((filledFields / requiredFields.length) * 100);
            progressBar.style.width = `${progress}%`;
            progressPercentage.textContent = `${progress}%`;
        }
        
        // Auto-save draft to localStorage
        function saveDraft() {
            const formData = new FormData(form);
            const draft = {};
            
            for (let [key, value] of formData.entries()) {
                draft[key] = value;
            }
            
            localStorage.setItem('studentFormDraft', JSON.stringify(draft));
        }
        
        // Load draft from localStorage
        function loadDraft() {
            const draft = localStorage.getItem('studentFormDraft');
            
            if (draft) {
                const draftData = JSON.parse(draft);
                
                Object.keys(draftData).forEach(key => {
                    const field = document.getElementById(key);
                    if (field) {
                        field.value = draftData[key];
                    }
                });
                
                updateProgress();
            }
        }
        
        // Clear draft from localStorage
        function clearDraft() {
            localStorage.removeItem('studentFormDraft');
        }
        
        // Show loading state when submitting form
        form.addEventListener('submit', function(e) {
            if (formSubmitted) return;
            
            e.preventDefault();
            
            // Show loading state
            submitText.textContent = 'Menyimpan...';
            loadingSpinner.classList.remove('hidden');
            submitButton.disabled = true;
            
            // Simulate form submission (in real app, this would be an AJAX request)
            setTimeout(function() {
                formSubmitted = true;
                clearDraft();
                form.submit();
            }, 1500);
        });
        
        // Track changes to form
        form.addEventListener('input', function() {
            hasUnsavedChanges = true;
            updateProgress();
            saveDraft();
        });
        
        // Show confirmation when trying to leave with unsaved changes
        window.addEventListener('beforeunload', function(e) {
            if (hasUnsavedChanges && !formSubmitted) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
        
        // Handle internal navigation
        document.querySelectorAll('a:not([href^="#"])').forEach(link => {
            link.addEventListener('click', function(e) {
                if (hasUnsavedChanges && !formSubmitted) {
                    e.preventDefault();
                    confirmationModal.classList.remove('hidden');
                    
                    confirmLeaveButton.onclick = function() {
                        hasUnsavedChanges = false;
                        window.location.href = link.href;
                    };
                }
            });
        });
        
        // Close confirmation modal
        cancelLeaveButton.addEventListener('click', function() {
            confirmationModal.classList.add('hidden');
        });
        
        // Auto-format NIS (only numbers)
        const nisInput = document.getElementById('nis');
        nisInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        
        // Auto-capitalize first letter of name
        const namaInput = document.getElementById('nama');
        namaInput.addEventListener('blur', function() {
            const words = this.value.toLowerCase().split(' ');
            const capitalizedWords = words.map(word => {
                return word.charAt(0).toUpperCase() + word.slice(1);
            });
            this.value = capitalizedWords.join(' ');
        });
        
        // Add visual feedback on form interaction
        const formInputs = document.querySelectorAll('input, select, textarea');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-primary', 'ring-opacity-50');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-primary', 'ring-opacity-50');
            });
        });
        
        // Initialize
        loadDraft();
        updateProgress();
    });
</script>
@endsection