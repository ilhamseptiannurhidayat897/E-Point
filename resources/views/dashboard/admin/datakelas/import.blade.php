@extends('dashboard.admin.main')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-50 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-1">Import Data Kelas</h1>
                <p class="text-sm text-gray-400">Unggah file Excel untuk menambahkan data kelas secara massal.</p>
            </div>
            <div class="bg-gradient-to-br from-indigo-100 to-purple-100 p-4 rounded-xl shadow-sm">
                <i class="fas fa-file-upload text-indigo-500 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-50 overflow-hidden">
        <div class="p-6">
            <!-- Success Notification -->
            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 rounded-xl flex items-start gap-3">
                <div class="flex-shrink-0 w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-emerald-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-emerald-800">Berhasil!</p>
                    <p class="text-sm text-emerald-600">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="text-emerald-400 hover:text-emerald-600 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            <!-- Error Notification -->
            @if(session('error'))
            <div class="mb-6 p-4 bg-rose-50 border border-rose-100 rounded-xl flex items-start gap-3">
                <div class="flex-shrink-0 w-6 h-6 bg-rose-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-exclamation text-rose-600 text-xs"></i>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-rose-800">Terjadi Kesalahan!</p>
                    <p class="text-sm text-rose-600">{{ session('error') }}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="text-rose-400 hover:text-rose-600 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            <form action="{{ route('datakelas.import.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf

                <!-- File Upload Area -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        Pilih File Excel
                    </label>
                    <div class="relative">
                        <input type="file"
                               name="file"
                               id="fileInput"
                               class="hidden"
                               accept=".xlsx,.xls"
                               required>
                        <label for="fileInput"
                               id="dropZone"
                               class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-indigo-50 hover:border-indigo-300 transition-all duration-200">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm font-medium text-gray-600">
                                Klik untuk memilih file
                            </p>
                            <p class="text-xs text-gray-400 mt-1">
                                Format: .xlsx, .xls
                            </p>
                        </label>
                    </div>
                    <p id="fileName" class="mt-2 text-sm text-gray-500">
                        Belum ada file yang dipilih
                    </p>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                    class="bg-primary text-white hover:bg-black-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-upload"></i>
                        <span>Import Data Sekarang</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const fileInput = document.getElementById('fileInput');
    const dropZone = document.getElementById('dropZone');
    const fileName = document.getElementById('fileName');

    // Handle file selection
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            fileName.textContent = `File yang dipilih: ${file.name}`;
            fileName.classList.add('text-indigo-600', 'font-medium');
        } else {
            fileName.textContent = 'Belum ada file yang dipilih';
            fileName.classList.remove('text-indigo-600', 'font-medium');
        }
    });

    // Handle drag and drop
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

    function highlight(e) {
        dropZone.classList.add('border-indigo-400', 'bg-indigo-50');
    }

    function unhighlight(e) {
        dropZone.classList.remove('border-indigo-400', 'bg-indigo-50');
    }

    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        if (files.length > 0) {
            fileInput.files = files;
            const event = new Event('change', { bubbles: true });
            fileInput.dispatchEvent(event);
        }
    }
</script>

@endsection