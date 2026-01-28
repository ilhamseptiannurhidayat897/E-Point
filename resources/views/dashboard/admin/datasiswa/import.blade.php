@extends('dashboard.admin.main')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 py-8">
    
    <!-- Card Container -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        
        <!-- Header Card -->
        <div class="px-6 py-6 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold text-gray-800">Import Data Siswa</h3>
                <p class="text-sm text-gray-500 mt-1">Unggah file Excel untuk memperbarui data siswa secara massal.</p>
            </div>
            <div class="h-12 w-12 bg-indigo-50 rounded-full flex items-center justify-center text-indigo-600">
                <i class="fas fa-user-graduate text-xl"></i>
            </div>
        </div>

        <!-- Form Area -->
        <div class="p-6 sm:p-8">
            <form method="POST" 
                  action="{{ route('datasiswa.import.store') }}" 
                  enctype="multipart/form-data"
                  id="importForm"
                  class="space-y-6">
                @csrf

                <!-- Alert Sukses -->
                @if(session('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-emerald-800 rounded-lg bg-emerald-50 border border-emerald-100" role="alert">
                    <svg class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
                @endif

                <!-- Area Upload File (Drag & Drop) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">File Excel / CSV</label>
                    
                    <div class="relative group">
                        <input type="file" 
                               name="file" 
                               id="fileInput" 
                               class="hidden" 
                               accept=".xlsx,.xls,.csv"
                               required>
                        
                        <label for="fileInput" 
                               id="dropZone"
                               class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-indigo-50 hover:border-indigo-400 transition-all duration-300 group-hover:shadow-md">
                            
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 group-hover:text-indigo-500 mb-3 transition-colors"></i>
                                <p class="mb-2 text-sm text-gray-600"><span class="font-semibold text-indigo-600">Klik untuk upload</span> atau seret file ke sini</p>
                                <p class="text-xs text-gray-400">Format yang didukung: .XLSX, .XLS, .CSV</p>
                            </div>
                        </label>
                    </div>
                    
                    <!-- Preview Nama File -->
                    <p id="filePreview" class="mt-3 text-sm text-gray-500 font-medium hidden">
                        <i class="fas fa-file-excel text-emerald-500 mr-2"></i>
                        <span id="fileNameDisplay"></span>
                    </p>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-file-import mr-2"></i>
                        Import Data Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Logic Drag & Drop
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const importForm = document.getElementById('importForm');

    // Mencegah default browser behavior saat drag
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Efek highlight saat drag
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.add('border-indigo-500', 'bg-indigo-50'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.remove('border-indigo-500', 'bg-indigo-50'), false);
    });

    // Handle file drop
    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }

    // Handle file select via click
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });

    function handleFiles(files) {
        if (files.length > 0) {
            const file = files[0];
            
            // Update UI preview
            fileNameDisplay.textContent = file.name;
            filePreview.classList.remove('hidden');
            
            // Ubah style dropzone untuk menunjukkan file sudah dipilih
            dropZone.classList.add('border-indigo-500', 'bg-indigo-50');
            dropZone.querySelector('p.mb-2').innerHTML = 'Ganti file?';
        }
    }
</script>
@endsection