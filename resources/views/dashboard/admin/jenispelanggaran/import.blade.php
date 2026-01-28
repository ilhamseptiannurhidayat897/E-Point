@extends('dashboard.admin.main')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-50 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-1">Import Jenis Pelanggaran</h1>
                <p class="text-sm text-gray-400">
                    Unggah file Excel untuk menambahkan data jenis pelanggaran secara massal.
                </p>
            </div>
            <div class="bg-gradient-to-br from-red-100 to-rose-100 p-4 rounded-xl shadow-sm">
                <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
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
                <button onclick="this.parentElement.parentElement.remove()"
                        class="text-emerald-400 hover:text-emerald-600 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            <form method="POST"
                  action="{{ route('jenispelanggaran.import.store') }}"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf

                <!-- File Upload -->
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
                               class="flex flex-col items-center justify-center w-full h-32
                                      border-2 border-dashed border-gray-300 rounded-xl cursor-pointer
                                      bg-gray-50 hover:bg-red-50 hover:border-red-300
                                      transition-all duration-200">
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

                <!-- Submit -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3
                                   bg-gradient-to-r from-primary to-purple-500
                                   text-white font-semibold rounded-xl shadow-md
                                   hover:shadow-lg transition-all duration-200
                                   transform hover:scale-105">
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

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            fileName.textContent = `File yang dipilih: ${file.name}`;
            fileName.classList.add('text-red-600', 'font-medium');
        } else {
            fileName.textContent = 'Belum ada file yang dipilih';
            fileName.classList.remove('text-red-600', 'font-medium');
        }
    });

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, e => {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.add('border-red-400', 'bg-red-50');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.remove('border-red-400', 'bg-red-50');
        });
    });

    dropZone.addEventListener('drop', e => {
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            fileInput.dispatchEvent(new Event('change', { bubbles: true }));
        }
    });
</script>
@endsection
