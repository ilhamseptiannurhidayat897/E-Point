@extends('dashboard.petugas.main')

@section('content')

<!-- Header -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                Input Pelanggaran
            </h1>
            <p class="text-sm text-gray-500">Catat pelanggaran siswa dengan lengkap</p>
        </div>
        <a href="{{ route('inputpelanggaran.index') }}" 
           class="flex items-center gap-2 text-primary hover:text-purple-600 font-semibold transition-colors">
            <i class="fas fa-arrow-left"></i>
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
            <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
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

    <form method="POST" action="{{ route('inputpelanggaran.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="space-y-6">
            
            <!-- SISWA dengan Search -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    <i class="fas fa-user-graduate mr-2 text-primary"></i>
                    Siswa <span class="text-red-500">*</span>
                </label>
                
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input
                        type="text"
                        id="searchSiswa"
                        placeholder="Ketik nama atau NIS siswa untuk mencari..."
                        class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        autocomplete="off"
                    >
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                    </div>
                </div>

                <!-- Selected Student Display -->
                <div id="selectedStudent" class="hidden mt-3 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 border border-primary/20 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white font-bold">
                                <span id="studentInitial"></span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800" id="studentName"></p>
                                <p class="text-sm text-gray-500" id="studentInfo"></p>
                            </div>
                        </div>
                        <button type="button" onclick="clearSelection()" class="text-red-500 hover:text-red-700 transition-colors">
                            <i class="fas fa-times-circle"></i>
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
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- JENIS PELANGGARAN dengan Search -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    <i class="fas fa-gavel mr-2 text-primary"></i>
                    Jenis Pelanggaran <span class="text-red-500">*</span>
                </label>
                
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input
                        type="text"
                        id="searchJenis"
                        placeholder="Ketik untuk mencari jenis pelanggaran..."
                        class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        autocomplete="off"
                    >
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                    </div>
                </div>

                <!-- Selected Jenis Display -->
                <div id="selectedJenis" class="hidden mt-3 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 border border-primary/20 rounded-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white">
                                <i class="fas fa-exclamation-triangle text-sm"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800" id="jenisName"></p>
                                <p class="text-sm text-gray-500" id="jenisInfo"></p>
                            </div>
                        </div>
                        <button type="button" onclick="clearJenisSelection()" class="text-red-500 hover:text-red-700 transition-colors">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </div>
                </div>

                <!-- Dropdown Results -->
                <div id="jenisDropdown" class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-xl shadow-lg max-h-64 overflow-y-auto">
                    <!-- Results akan diisi via JavaScript -->
                </div>

                <!-- Hidden Input -->
                <input type="hidden" name="jenis_pelanggaran_id" id="jenis_pelanggaran_id" required>

                @error('jenis_pelanggaran_id')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- KETERANGAN -->
            <div>
                <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-3">
                    <i class="fas fa-file-alt mr-2 text-primary"></i>
                    Keterangan Pelanggaran
                </label>
                <div class="relative">
                    <div class="absolute top-3 left-4 pointer-events-none">
                        <i class="fas fa-pen text-gray-400"></i>
                    </div>
                    <textarea
                        name="keterangan"
                        id="keterangan"
                        rows="4"
                        class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                        placeholder="Masukkan detail keterangan pelanggaran..."
                    >{{ old('keterangan') }}</textarea>
                </div>
                @error('keterangan')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- FOTO BUKTI -->
            <div>
                <label for="foto" class="block text-sm font-semibold text-gray-700 mb-3">
                    <i class="fas fa-camera mr-2 text-primary"></i>
                    Foto Bukti <span class="text-gray-400 text-xs font-normal">(Opsional)</span>
                </label>
                <div class="relative">
                    <div class="absolute top-3 left-4 pointer-events-none">
                        <i class="fas fa-image text-gray-400"></i>
                    </div>
                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        accept="image/*"
                        class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-colors"
                    >
                </div>
                <p class="mt-2 text-xs text-gray-500">Format: JPG, PNG, JPEG (Max 2MB)</p>
                @error('foto')
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

        <!-- Info Box -->
        <div class="mt-8 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 border border-primary/20 rounded-xl">
            <div class="flex gap-3">
                <i class="fas fa-info-circle text-primary mt-0.5"></i>
                <div class="flex-1">
                    <p class="font-semibold text-gray-800 mb-1">Informasi Penting</p>
                    <p class="text-sm text-gray-600">
                        Pastikan data siswa dan jenis pelanggaran yang dipilih sudah benar. Foto bukti sangat disarankan untuk dokumentasi lengkap.
                    </p>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('inputpelanggaran.index') }}" 
               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-colors">
                <i class="fas fa-times mr-2"></i>
                Batal
            </a>
            <button
                type="submit"
                class="px-6 py-3 bg-gradient-to-r from-primary to-purple-600 hover:from-purple-600 hover:to-primary text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all inline-flex items-center gap-2"
            >
                <i class="fas fa-save"></i>
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
                     onclick="selectSiswa(${siswa.id}, '${siswa.nama}', '${siswa.nis}', '${siswa.kelas?.nama_kelas || '-'}')">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                            ${siswa.nama.charAt(0).toUpperCase()}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">${siswa.nama}</p>
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

// ===== JENIS PELANGGARAN SEARCH =====
const searchJenisInput = document.getElementById('searchJenis');
const jenisDropdown = document.getElementById('jenisDropdown');
const hiddenJenisInput = document.getElementById('jenis_pelanggaran_id');
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

    // Filter jenis pelanggaran
    const filtered = jenisData.filter(j => 
        j.nama.toLowerCase().includes(searchTerm)
    );

    // Tampilkan hasil
    if (filtered.length > 0) {
        let html = '<div class="py-2">';
        filtered.forEach(jenis => {
            html += `
                <div class="px-4 py-3 hover:bg-primary/5 cursor-pointer transition-colors border-b border-gray-100 last:border-0" 
                     onclick="selectJenis(${jenis.id}, '${jenis.nama}', ${jenis.poin})">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white">
                            <i class="fas fa-exclamation-triangle text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">${jenis.nama}</p>
                            <p class="text-sm text-primary font-semibold">-${jenis.poin} Poin</p>
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
                <i class="fas fa-gavel text-3xl mb-2 text-gray-300"></i>
                <p class="text-sm">Jenis pelanggaran tidak ditemukan</p>
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
    jenisInfo.textContent = `-${poin} Poin`;
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