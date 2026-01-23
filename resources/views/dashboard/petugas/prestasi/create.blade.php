@extends('dashboard.petugas.main')

@section('content')

<!-- Header -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                Input Prestasi Siswa
            </h1>
            <p class="text-sm text-gray-500">Catat prestasi siswa dengan lengkap</p>
        </div>
        <a href="{{ route('inputprestasi.index') }}" 
           class="flex items-center gap-2 px-4 py-2 text-primary hover:bg-primary/5 rounded-lg font-semibold transition-all">
            <i class="fas fa-arrow-left w-4 h-4"></i>
            <span>Kembali</span>
        </a>
    </div>
</div>

<!-- Form Card -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
    
    <!-- Error Alert -->
    @if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl p-4">
        <div class="flex items-start gap-3">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-circle text-red-500 mt-0.5 w-5 h-5"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold mb-2">Terdapat kesalahan:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <form method="POST" action="{{ route('inputprestasi.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
            
            <!-- SISWA dengan Search -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                    <i class="fas fa-user-graduate w-4 h-4 mr-2 text-primary"></i>
                    Siswa <span class="text-red-500 ml-1">*</span>
                </label>
                
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search w-4 h-4 text-gray-400"></i>
                    </div>
                    <input
                        type="text"
                        id="searchSiswa"
                        placeholder="Ketik nama atau NIS siswa untuk mencari..."
                        class="w-full pl-11 pr-10 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                        autocomplete="off"
                    >
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <i class="fas fa-chevron-down w-3 h-3 text-gray-400"></i>
                    </div>
                </div>

                <!-- Selected Student Display -->
                <div id="selectedStudent" class="hidden mt-3 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 border border-primary/20 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white font-bold flex-shrink-0">
                                <span id="studentInitial" class="text-sm"></span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-gray-800 truncate" id="studentName"></p>
                                <p class="text-sm text-gray-500" id="studentInfo"></p>
                            </div>
                        </div>
                        <button type="button" onclick="clearSelection()" class="text-red-500 hover:text-red-700 transition-colors p-1">
                            <i class="fas fa-times-circle w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- Dropdown Results -->
                <div id="siswaDropdown" class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-xl shadow-lg max-h-64 overflow-y-auto">
                    <!-- Results akan diisi via JavaScript -->
                </div>

                <!-- Hidden Input -->
                <input type="hidden" name="siswa_id" id="siswa_id" required>

                @error('siswa_id')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle w-3 h-3"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- JENIS PRESTASI dengan Search -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                    <i class="fas fa-trophy w-4 h-4 mr-2 text-primary"></i>
                    Jenis Prestasi <span class="text-red-500 ml-1">*</span>
                </label>
                
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search w-4 h-4 text-gray-400"></i>
                    </div>
                    <input
                        type="text"
                        id="searchJenis"
                        placeholder="Ketik untuk mencari jenis prestasi..."
                        class="w-full pl-11 pr-10 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                        autocomplete="off"
                    >
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <i class="fas fa-chevron-down w-3 h-3 text-gray-400"></i>
                    </div>
                </div>

                <!-- Selected Jenis Display -->
                <div id="selectedJenis" class="hidden mt-3 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 border border-primary/20 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white flex-shrink-0">
                                <i class="fas fa-award text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-gray-800 truncate" id="jenisName"></p>
                                <p class="text-sm text-gray-500" id="jenisInfo"></p>
                            </div>
                        </div>
                        <button type="button" onclick="clearJenisSelection()" class="text-red-500 hover:text-red-700 transition-colors p-1">
                            <i class="fas fa-times-circle w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- Dropdown Results -->
                <div id="jenisDropdown" class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-xl shadow-lg max-h-64 overflow-y-auto">
                    <!-- Results akan diisi via JavaScript -->
                </div>

                <!-- Hidden Input -->
                <input type="hidden" name="jenis_prestasi_id" id="jenis_prestasi_id" required>

                @error('jenis_prestasi_id')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle w-3 h-3"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- KETERANGAN -->
            <div>
                <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                    <i class="fas fa-file-alt w-4 h-4 mr-2 text-primary"></i>
                    Keterangan Prestasi
                </label>
                <div class="relative">
                    <textarea
                        name="keterangan"
                        id="keterangan"
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none transition-all"
                        placeholder="Masukkan detail keterangan prestasi..."
                    >{{ old('keterangan') }}</textarea>
                </div>
                @error('keterangan')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle w-3 h-3"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- FOTO BUKTI -->
            <div>
                <label for="foto" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                    <i class="fas fa-camera w-4 h-4 mr-2 text-primary"></i>
                    Foto Prestasi <span class="text-gray-400 text-xs font-normal ml-1">(Opsional)</span>
                </label>
                <div class="relative">
                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-all cursor-pointer"
                    >
                </div>
                <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
                    <i class="fas fa-info-circle w-3 h-3"></i>
                    Format: JPG, PNG, JPEG (Max 2MB)
                </p>
                @error('foto')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle w-3 h-3"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

        <!-- Info Box -->
        <div class="mt-8 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 border border-primary/20 rounded-xl">
            <div class="flex gap-3">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-primary mt-0.5 w-5 h-5"></i>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-gray-800 mb-1">Informasi Penting</p>
                    <p class="text-sm text-gray-600">
                        Pastikan data siswa dan jenis prestasi yang dipilih sudah benar. Foto prestasi bersifat opsional namun sangat disarankan untuk dokumentasi lengkap.
                    </p>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('inputprestasi.index') }}" 
               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-all inline-flex items-center gap-2">
                <i class="fas fa-times w-4 h-4"></i>
                <span>Batal</span>
            </a>
            <button
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-primary to-purple-600 hover:from-purple-600 hover:to-primary text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all inline-flex items-center gap-2"
            >
                <i class="fas fa-save w-4 h-4"></i>
                <span>Simpan Data</span>
            </button>
        </div>
    </form>

</div>

<script>
// Data dari server
const siswaData = @json($siswa);
const jenisData = @json($jenis);

// ===== SISWA SEARCH =====
const searchInput = document.getElementById('searchSiswa');
const dropdown = document.getElementById('siswaDropdown');
const hiddenInput = document.getElementById('siswa_id');
const selectedDiv = document.getElementById('selectedStudent');
const studentName = document.getElementById('studentName');
const studentInfo = document.getElementById('studentInfo');
const studentInitial = document.getElementById('studentInitial');

// Event listener untuk search siswa
searchInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase().trim();
    
    if (searchTerm.length < 2) {
        dropdown.classList.add('hidden');
        return;
    }

    // Filter siswa
    const filtered = siswaData.filter(s => 
        s.nama.toLowerCase().includes(searchTerm) || 
        s.nis.includes(searchTerm)
    );

    // Tampilkan hasil
    if (filtered.length > 0) {
        let html = '<div class="py-2">';
        filtered.forEach(siswa => {
            html += `
                <div class="px-4 py-3 hover:bg-primary/5 cursor-pointer transition-colors border-b border-gray-100 last:border-0" 
                     onclick="selectSiswa(${siswa.id}, '${siswa.nama.replace(/'/g, "\\'")}', '${siswa.nis}', '${siswa.kelas?.nama_kelas || '-'}')">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                            ${siswa.nama.charAt(0).toUpperCase()}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 truncate">${siswa.nama}</p>
                            <p class="text-sm text-gray-500">NIS: ${siswa.nis} • ${siswa.kelas?.nama_kelas || '-'}</p>
                        </div>
                    </div>
                </div>
            `;
        });
        html += '</div>';
        dropdown.innerHTML = html;
        dropdown.classList.remove('hidden');
    } else {
        dropdown.innerHTML = `
            <div class="px-4 py-8 text-center text-gray-500">
                <i class="fas fa-user-slash text-3xl mb-2 text-gray-300"></i>
                <p class="text-sm">Siswa tidak ditemukan</p>
            </div>
        `;
        dropdown.classList.remove('hidden');
    }
});

// Function select siswa
function selectSiswa(id, nama, nis, kelas) {
    hiddenInput.value = id;
    searchInput.value = '';
    dropdown.classList.add('hidden');
    
    // Tampilkan selected
    studentInitial.textContent = nama.charAt(0).toUpperCase();
    studentName.textContent = nama;
    studentInfo.textContent = `NIS: ${nis} • ${kelas}`;
    selectedDiv.classList.remove('hidden');
}

// Function clear selection
function clearSelection() {
    hiddenInput.value = '';
    selectedDiv.classList.add('hidden');
}

// ===== JENIS PRESTASI SEARCH =====
const searchJenisInput = document.getElementById('searchJenis');
const jenisDropdown = document.getElementById('jenisDropdown');
const hiddenJenisInput = document.getElementById('jenis_prestasi_id');
const selectedJenisDiv = document.getElementById('selectedJenis');
const jenisName = document.getElementById('jenisName');
const jenisInfo = document.getElementById('jenisInfo');

// Event listener untuk search jenis
searchJenisInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase().trim();
    
    if (searchTerm.length < 2) {
        jenisDropdown.classList.add('hidden');
        return;
    }

    // Filter jenis prestasi
    const filtered = jenisData.filter(j => 
        j.nama.toLowerCase().includes(searchTerm)
    );

    // Tampilkan hasil
    if (filtered.length > 0) {
        let html = '<div class="py-2">';
        filtered.forEach(jenis => {
            html += `
                <div class="px-4 py-3 hover:bg-primary/5 cursor-pointer transition-colors border-b border-gray-100 last:border-0" 
                     onclick="selectJenis(${jenis.id}, '${jenis.nama.replace(/'/g, "\\'")}', ${jenis.poin})">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white flex-shrink-0">
                            <i class="fas fa-award text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 truncate">${jenis.nama}</p>
                            <p class="text-sm text-green-600 font-semibold">+${jenis.poin} Poin</p>
                        </div>
                    </div>
                </div>
            `;
        });
        html += '</div>';
        jenisDropdown.innerHTML = html;
        jenisDropdown.classList.remove('hidden');
    } else {
        jenisDropdown.innerHTML = `
            <div class="px-4 py-8 text-center text-gray-500">
                <i class="fas fa-trophy text-3xl mb-2 text-gray-300"></i>
                <p class="text-sm">Jenis prestasi tidak ditemukan</p>
            </div>
        `;
        jenisDropdown.classList.remove('hidden');
    }
});

// Function select jenis
function selectJenis(id, nama, poin) {
    hiddenJenisInput.value = id;
    searchJenisInput.value = '';
    jenisDropdown.classList.add('hidden');
    
    // Tampilkan selected
    jenisName.textContent = nama;
    jenisInfo.textContent = `+${poin} Poin`;
    selectedJenisDiv.classList.remove('hidden');
}

// Function clear jenis selection
function clearJenisSelection() {
    hiddenJenisInput.value = '';
    selectedJenisDiv.classList.add('hidden');
}

// Close dropdown saat klik di luar
document.addEventListener('click', function(e) {
    if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add('hidden');
    }
    if (!searchJenisInput.contains(e.target) && !jenisDropdown.contains(e.target)) {
        jenisDropdown.classList.add('hidden');
    }
});
</script>

@endsection