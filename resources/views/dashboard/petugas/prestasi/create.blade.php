@extends('dashboard.petugas.main')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    
    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">
                Input Prestasi siswa
            </h1>
        </div>
        <p class="text-sm text-gray-500">Isi form berikut untuk mencatat Prestasi siswa</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-lg">
        <form method="POST" action="{{ route('inputprestasi.store') }}" enctype="multipart/form-data" class="p-8">
            @csrf

            <!-- Error Messages -->
            @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                <div class="flex items-start gap-3">
                    <i class="fas fa-exclamation-triangle text-red-500 mt-0.5"></i>
                    <div class="text-sm flex-1">
                        <p class="font-semibold text-red-700 mb-2">Periksa data berikut:</p>
                        <ul class="space-y-1 text-red-600">
                            @foreach ($errors->all() as $error)
                                <li class="flex items-start gap-2">
                                    <span class="mt-1">•</span>
                                    <span>{{ $error }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- Form Grid -->
            <div class="space-y-6">
                
                <!-- SISWA -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-user text-primary"></i>
                            <span>Siswa</span>
                            <span class="text-red-500">*</span>
                        </span>
                    </label>
                    
                    <div class="space-y-3">
                        <!-- Search Input -->
                        <div class="relative">
                            <input
                                type="text"
                                id="searchSiswa"
                                placeholder="Cari siswa (nama/NIS)..."
                                class="w-full pl-10 pr-4 py-3 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all"
                            >
                            <i class="fas fa-search absolute left-3.5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>

                        <!-- Dropdown Results -->
                        <div id="siswaDropdown" class="hidden absolute z-20 w-full max-w-3xl bg-white border border-gray-300 rounded-xl shadow-xl max-h-64 overflow-y-auto"></div>

                        <!-- Selected Student -->
                        <div id="selectedStudent" class="hidden p-4 bg-blue-50 border border-blue-200 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-primary text-white rounded-xl flex items-center justify-center font-semibold">
                                        <span id="studentInitial"></span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800" id="studentName"></p>
                                        <p class="text-xs text-gray-600" id="studentInfo"></p>
                                    </div>
                                </div>
                                <button type="button" onclick="clearSelection()" 
                                        class="text-gray-400 hover:text-red-500 transition-colors p-2">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="siswa_id" id="siswa_id" required>
                    </div>
                </div>

                <!-- JENIS PRESTASI -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-award text-primary"></i>
                            <span>Jenis Prestasi</span>
                            <span class="text-red-500">*</span>
                        </span>
                    </label>
                    
                    <div class="space-y-3">
                        <!-- Search Input with Select Button -->
                        <div class="relative">
                            <input
                                type="text"
                                id="searchJenis"
                                placeholder="Ketik untuk mencari atau klik tombol pilih..."
                                class="w-full pl-10 pr-28 py-3 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all"
                            >
                            <i class="fas fa-search absolute left-3.5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <button type="button" 
                                    onclick="showAllJenis()"
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 px-4 py-1.5 bg-primary text-white text-xs font-medium rounded-lg hover:bg-primary/90 transition-colors flex items-center gap-1.5">
                                <i class="fas fa-list"></i>
                                <span>Pilih</span>
                            </button>
                        </div>

                        <!-- Dropdown Results -->
                        <div id="jenisDropdown" class="hidden absolute z-30 w-full max-w-3xl bg-white border border-gray-300 rounded-xl shadow-xl max-h-64 overflow-y-auto"></div>

                        <!-- Selected Jenis -->
                        <div id="selectedJenis" class="hidden p-4 bg-green-50 border border-green-200 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 flex-1 min-w-0">
                                    <div class="w-10 h-10 bg-green-500 text-white rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-800 truncate" id="jenisName"></p>
                                        <div class="flex items-center gap-3 mt-0.5">
                                            <span class="text-xs font-semibold text-green-600" id="jenisInfo"></span>
                                            <span class="text-xs text-gray-500" id="jenisKategori"></span>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="clearJenisSelection()" 
                                        class="text-gray-400 hover:text-red-500 transition-colors p-2 ml-2">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="jenis_prestasi_id" id="jenis_prestasi_id" required>
                    </div>
                </div>

                <!-- KETERANGAN -->
                <div>
                    <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-3">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-file-alt text-primary"></i>
                            <span>Keterangan</span>
                        </span>
                    </label>
                    <textarea
                        name="keterangan"
                        id="keterangan"
                        rows="4"
                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none resize-none transition-all"
                        placeholder="Deskripsi prestasi..."
                    >{{ old('keterangan') }}</textarea>
                </div>

                <!-- FOTO BUKTI -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-image text-primary"></i>
                            <span>Bukti Prestasi</span>
                            <span class="text-xs font-normal text-gray-500 ml-1">(opsional)</span>
                        </span>
                    </label>
                    
                    <div class="space-y-3">
                        <div>
                            <input
                                type="file"
                                name="foto"
                                id="foto"
                                accept="image/*"
                                class="hidden"
                                onchange="previewImage(event)"
                            >
                            <label for="foto" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 hover:border-primary rounded-xl p-8 text-center transition-all hover:bg-blue-50">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                                    <p class="text-sm font-medium text-gray-700 mb-1">Klik untuk upload bukti</p>
                                    <p class="text-xs text-gray-500">JPG, PNG, JPEG (Max 2MB)</p>
                                </div>
                            </label>
                        </div>

                        <div id="imagePreview" class="hidden">
                            <div class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-semibold text-gray-700">Preview:</span>
                                    <button type="button" onclick="removeImage()" 
                                            class="text-xs text-red-500 hover:text-red-700 font-medium flex items-center gap-1 transition-colors">
                                        <i class="fas fa-trash"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                                <img id="previewImage" class="max-h-48 w-auto rounded-lg border border-gray-200 mx-auto shadow-sm">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Submit Buttons -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex justify-end gap-3">
                    <a href="{{ route('inputprestasi.index') }}" 
                       class="px-6 py-2.5 text-sm font-medium border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors inline-flex items-center gap-2">
                        <i class="fas fa-times"></i>
                        <span>Batal</span>
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 text-sm font-medium bg-primary text-white rounded-xl hover:bg-primary/90 transition-colors inline-flex items-center gap-2 shadow-sm hover:shadow-md">
                        <i class="fas fa-save"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal All Jenis -->
<div id="allJenisModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-2xl max-w-lg w-full max-h-[85vh] overflow-hidden flex flex-col shadow-2xl">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gradient-to-r from-primary/5 to-purple-600/5">
            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                <i class="fas fa-list-ul text-primary"></i>
                <span>Pilih Jenis Prestasi</span>
            </h3>
            <button onclick="closeAllJenisModal()" 
                    class="text-gray-500 hover:text-gray-700 transition-colors p-2">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="p-6 overflow-y-auto flex-1">
            
            <!-- Search in Modal -->
            <div class="relative mb-4">
                <input
                    type="text"
                    id="modalSearchJenis"
                    placeholder="Cari jenis prestasi..."
                    class="w-full pl-10 pr-4 py-3 text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all"
                >
                <i class="fas fa-search absolute left-3.5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>

            <!-- Categories -->
            <div id="modalJenisList" class="space-y-4">
                <!-- Categories will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>

<script>
// Data from server
const siswaData = @json($siswa);
const jenisData = @json($jenis);

// ===== SISWA SEARCH =====
const searchSiswa = document.getElementById('searchSiswa');
const siswaDropdown = document.getElementById('siswaDropdown');
const siswaIdInput = document.getElementById('siswa_id');
const selectedStudentDiv = document.getElementById('selectedStudent');
const studentName = document.getElementById('studentName');
const studentInfo = document.getElementById('studentInfo');
const studentInitial = document.getElementById('studentInitial');

searchSiswa.addEventListener('focus', function() {
    if (this.value.trim().length >= 1) {
        searchSiswaHandler();
    }
});

searchSiswa.addEventListener('input', searchSiswaHandler);

function searchSiswaHandler() {
    const term = searchSiswa.value.toLowerCase().trim();
    
    if (term.length === 0) {
        siswaDropdown.classList.add('hidden');
        return;
    }

    const filtered = siswaData.filter(s => 
        s.nama.toLowerCase().includes(term) || 
        s.nis.includes(term)
    );

    if (filtered.length > 0) {
        let html = '<div class="p-2">';
        filtered.forEach(siswa => {
            html += `
                <div class="px-4 py-3 hover:bg-blue-50 cursor-pointer border-b border-gray-100 last:border-0 text-sm rounded-lg transition-colors" 
                     onclick="selectSiswa(${siswa.id}, '${siswa.nama.replace(/'/g, "\\'")}', '${siswa.nis}', '${siswa.kelas?.nama_kelas || '-'}')">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center font-semibold flex-shrink-0">
                            ${siswa.nama.charAt(0).toUpperCase()}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 truncate">${siswa.nama}</p>
                            <p class="text-xs text-gray-500 truncate">${siswa.nis} • ${siswa.kelas?.nama_kelas || '-'}</p>
                        </div>
                    </div>
                </div>
            `;
        });
        html += '</div>';
        siswaDropdown.innerHTML = html;
        
        // Position dropdown
        const rect = searchSiswa.getBoundingClientRect();
        siswaDropdown.style.top = `${rect.bottom + window.scrollY + 4}px`;
        siswaDropdown.style.left = `${rect.left + window.scrollX}px`;
        siswaDropdown.style.width = `${rect.width}px`;
        
        siswaDropdown.classList.remove('hidden');
    } else {
        siswaDropdown.innerHTML = `
            <div class="p-8 text-center text-gray-500 text-sm">
                <i class="fas fa-user-slash text-2xl mb-2 text-gray-300"></i>
                <p>Siswa tidak ditemukan</p>
            </div>
        `;
        siswaDropdown.classList.remove('hidden');
    }
}

function selectSiswa(id, nama, nis, kelas) {
    siswaIdInput.value = id;
    searchSiswa.value = '';
    siswaDropdown.classList.add('hidden');
    
    studentInitial.textContent = nama.charAt(0).toUpperCase();
    studentName.textContent = nama;
    studentInfo.textContent = `${nis} • ${kelas}`;
    selectedStudentDiv.classList.remove('hidden');
}

function clearSelection() {
    siswaIdInput.value = '';
    selectedStudentDiv.classList.add('hidden');
}

// ===== JENIS PRESTASI SEARCH (In-page) =====
const searchJenis = document.getElementById('searchJenis');
const jenisDropdown = document.getElementById('jenisDropdown');
const jenisIdInput = document.getElementById('jenis_prestasi_id');
const selectedJenisDiv = document.getElementById('selectedJenis');
const jenisName = document.getElementById('jenisName');
const jenisInfo = document.getElementById('jenisInfo');
const jenisKategori = document.getElementById('jenisKategori');

searchJenis.addEventListener('focus', function() {
    if (this.value.trim().length >= 1) {
        searchJenisHandler();
    }
});

searchJenis.addEventListener('input', searchJenisHandler);

function searchJenisHandler() {
    const term = searchJenis.value.toLowerCase().trim();
    
    if (term.length === 0) {
        jenisDropdown.classList.add('hidden');
        return;
    }

    const filtered = jenisData.filter(j => 
        j.nama.toLowerCase().includes(term) ||
        (j.kategori && j.kategori.toLowerCase().includes(term))
    );

    if (filtered.length > 0) {
        let html = '<div class="p-2">';
        filtered.forEach(jenis => {
            html += `
                <div class="px-4 py-3 hover:bg-green-50 cursor-pointer border-b border-gray-100 last:border-0 text-sm rounded-lg transition-colors" 
                     onclick="selectJenis(${jenis.id}, '${jenis.nama.replace(/'/g, "\\'")}', ${jenis.poin}, '${jenis.kategori || ''}')">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 truncate">${jenis.nama}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold text-green-600">+${jenis.poin} poin</span>
                                <span class="text-xs text-gray-500">${jenis.kategori || 'Umum'}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        html += '</div>';
        jenisDropdown.innerHTML = html;
        
        // Position dropdown
        const rect = searchJenis.getBoundingClientRect();
        jenisDropdown.style.top = `${rect.bottom + window.scrollY + 4}px`;
        jenisDropdown.style.left = `${rect.left + window.scrollX}px`;
        jenisDropdown.style.width = `${rect.width}px`;
        
        jenisDropdown.classList.remove('hidden');
    } else {
        jenisDropdown.innerHTML = `
            <div class="p-8 text-center text-gray-500 text-sm">
                <i class="fas fa-trophy text-2xl mb-2 text-gray-300"></i>
                <p>Jenis prestasi tidak ditemukan</p>
            </div>
        `;
        jenisDropdown.classList.remove('hidden');
    }
}

function selectJenis(id, nama, poin, kategori) {
    jenisIdInput.value = id;
    searchJenis.value = '';
    jenisDropdown.classList.add('hidden');
    
    jenisName.textContent = nama;
    jenisInfo.textContent = `+${poin} poin`;
    jenisKategori.textContent = kategori ? kategori : '';
    selectedJenisDiv.classList.remove('hidden');
}

function clearJenisSelection() {
    jenisIdInput.value = '';
    selectedJenisDiv.classList.add('hidden');
}

// ===== MODAL ALL JENIS =====
const modalSearchJenis = document.getElementById('modalSearchJenis');
const modalJenisList = document.getElementById('modalJenisList');
const allJenisModal = document.getElementById('allJenisModal');

function showAllJenis() {
    // Group jenis by kategori
    const groupedJenis = {};
    jenisData.forEach(jenis => {
        const kategori = jenis.kategori || 'Umum';
        if (!groupedJenis[kategori]) {
            groupedJenis[kategori] = [];
        }
        groupedJenis[kategori].push(jenis);
    });

    // Build modal content
    let html = '';
    Object.keys(groupedJenis).sort().forEach(kategori => {
        html += `
            <div class="mb-5">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3 flex items-center gap-2">
                    <i class="fas fa-folder text-primary"></i>
                    <span>${kategori}</span>
                </h4>
                <div class="space-y-2">
        `;
        
        groupedJenis[kategori].forEach(jenis => {
            html += `
                <div class="px-4 py-3 hover:bg-green-50 cursor-pointer border border-gray-200 rounded-xl text-sm transition-all hover:border-green-300 hover:shadow-sm" 
                     onclick="selectJenisFromModal(${jenis.id}, '${jenis.nama.replace(/'/g, "\\'")}', ${jenis.poin}, '${jenis.kategori || ''}')">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3 flex-1 min-w-0">
                            <div class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-award"></i>
                            </div>
                            <span class="font-semibold text-gray-800 truncate">${jenis.nama}</span>
                        </div>
                        <span class="text-xs font-bold text-green-600 ml-2">+${jenis.poin} poin</span>
                    </div>
                </div>
            `;
        });
        
        html += `
                </div>
            </div>
        `;
    });

    modalJenisList.innerHTML = html;
    allJenisModal.classList.remove('hidden');
    allJenisModal.classList.add('flex');
    
    // Focus search input in modal
    setTimeout(() => {
        modalSearchJenis.focus();
    }, 100);
}

function closeAllJenisModal() {
    allJenisModal.classList.add('hidden');
    allJenisModal.classList.remove('flex');
}

function selectJenisFromModal(id, nama, poin, kategori) {
    selectJenis(id, nama, poin, kategori);
    closeAllJenisModal();
}

// Search in modal
modalSearchJenis.addEventListener('input', function() {
    const term = this.value.toLowerCase().trim();
    
    // Group and filter
    const groupedJenis = {};
    jenisData.forEach(jenis => {
        const kategori = jenis.kategori || 'Umum';
        if (!groupedJenis[kategori]) {
            groupedJenis[kategori] = [];
        }
        
        if (term === '' || 
            jenis.nama.toLowerCase().includes(term) ||
            (jenis.kategori && jenis.kategori.toLowerCase().includes(term))) {
            groupedJenis[kategori].push(jenis);
        }
    });

    // Build filtered content
    let html = '';
    Object.keys(groupedJenis).sort().forEach(kategori => {
        if (groupedJenis[kategori].length > 0) {
            html += `
                <div class="mb-5">
                    <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3 flex items-center gap-2">
                        <i class="fas fa-folder text-primary"></i>
                        <span>${kategori}</span>
                    </h4>
                    <div class="space-y-2">
            `;
            
            groupedJenis[kategori].forEach(jenis => {
                html += `
                    <div class="px-4 py-3 hover:bg-green-50 cursor-pointer border border-gray-200 rounded-xl text-sm transition-all hover:border-green-300 hover:shadow-sm" 
                         onclick="selectJenisFromModal(${jenis.id}, '${jenis.nama.replace(/'/g, "\\'")}', ${jenis.poin}, '${jenis.kategori || ''}')">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3 flex-1 min-w-0">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-award"></i>
                                </div>
                                <span class="font-semibold text-gray-800 truncate">${jenis.nama}</span>
                            </div>
                            <span class="text-xs font-bold text-green-600 ml-2">+${jenis.poin} poin</span>
                        </div>
                    </div>
                `;
            });
            
            html += `
                    </div>
                </div>
            `;
        }
    });

    if (html === '') {
        html = `
            <div class="text-center py-12 text-gray-500">
                <i class="fas fa-search text-3xl mb-3 text-gray-300"></i>
                <p class="text-sm font-medium">Tidak ditemukan jenis prestasi</p>
            </div>
        `;
    }

    modalJenisList.innerHTML = html;
});

// ===== IMAGE PREVIEW =====
function previewImage(event) {
    const input = event.target;
    const previewDiv = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImage');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewDiv.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const fileInput = document.getElementById('foto');
    const previewDiv = document.getElementById('imagePreview');
    
    fileInput.value = '';
    previewDiv.classList.add('hidden');
}

// ===== CLOSE DROPDOWNS =====
document.addEventListener('click', function(e) {
    if (!searchSiswa.contains(e.target) && !siswaDropdown.contains(e.target)) {
        siswaDropdown.classList.add('hidden');
    }
    if (!searchJenis.contains(e.target) && !jenisDropdown.contains(e.target)) {
        jenisDropdown.classList.add('hidden');
    }
});

// Close modal on ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !allJenisModal.classList.contains('hidden')) {
        closeAllJenisModal();
    }
});
</script>

<style>
/* Custom scrollbar for dropdowns */
#siswaDropdown::-webkit-scrollbar,
#jenisDropdown::-webkit-scrollbar {
    width: 6px;
}

#siswaDropdown::-webkit-scrollbar-track,
#jenisDropdown::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

#siswaDropdown::-webkit-scrollbar-thumb,
#jenisDropdown::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
}

#siswaDropdown::-webkit-scrollbar-thumb:hover,
#jenisDropdown::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Custom scrollbar for modal */
#allJenisModal > div > div:nth-child(2)::-webkit-scrollbar {
    width: 8px;
}

#allJenisModal > div > div:nth-child(2)::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

#allJenisModal > div > div:nth-child(2)::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
}

#allJenisModal > div > div:nth-child(2)::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>

@endsection