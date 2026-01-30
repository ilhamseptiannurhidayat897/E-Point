@extends('dashboard.bk.main')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

    <!-- ================= HEADER ================= -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            
            <!-- Judul & Info -->
            <div class="flex-1">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                    Data Siswa
                </h1>
                <p class="text-sm text-gray-500 flex items-center gap-2">
                    <i class="fas fa-users text-xs text-primary"></i>
                    Total {{ $siswa->total() }} siswa terdaftar
                </p>
            </div>
            
            <!-- Toolbar: Search & PDF -->
            <div class="flex flex-col sm:flex-row items-stretch gap-3 w-full lg:w-auto">
                
                <!-- FORM PENCARIAN -->
                <form action="{{ route('bk.siswa.index') }}" method="GET" class="relative w-full sm:w-64 group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 group-focus-within:text-primary transition-colors"></i>
                    </div>
                    <input type="text" 
                           name="search" 
                           value="{{ request()->get('search') }}"
                           placeholder="Cari nama siswa..." 
                           class="w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all text-sm">
                    @if(request()->has('search'))
                        <a href="{{ route('bk.siswa.index') }}" 
                           class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-red-500 cursor-pointer transition-colors">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                </form>

                <!-- FORM PDF -->
                <form action="{{ route('bk.siswa.pdf') }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
                    <select name="kelas_id" 
                            required 
                            class="w-full sm:w-44 px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary bg-white transition-all">
                        <option value="" disabled selected>-- Pilih Kelas --</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                    <button type="submit" 
                            class="px-4 py-2.5 bg-red-50 text-red-600 border border-red-100 rounded-lg font-medium hover:bg-red-100 hover:shadow-md transition-all duration-200 flex items-center gap-2 whitespace-nowrap">
                        <i class="fas fa-file-pdf"></i>
                        <span>PDF</span>
                    </button>
                </form>
            </div>
        </div>
    </div>


    <!-- ================= TABLE ================= -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500">
                        <th class="px-6 py-4 font-semibold w-16 text-center">No</th>
                        <th class="px-6 py-4 font-semibold">Nama Siswa</th>
                        <th class="px-6 py-4 font-semibold">NIS</th>
                        <th class="px-6 py-4 font-semibold">Kelas</th>
                        <th class="px-6 py-4 font-semibold">Wali Kelas</th>
                        <th class="px-6 py-4 text-center font-semibold w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($siswa as $index => $item)
                    <tr class="hover:bg-primary/5 transition-colors duration-150 group">
                        <td class="px-6 py-4 text-sm text-gray-500 text-center">
                            {{ $siswa->firstItem() + $index }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm ring-2 ring-primary/5 group-hover:ring-primary/20 transition-all flex-shrink-0">
                                    {{ strtoupper(substr($item->nama, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="font-semibold text-gray-800 truncate">{{ $item->nama }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono text-sm text-gray-600">
                            {{ $item->nis }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $item->kelas->nama_kelas }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $item->kelas->walikelas->nama ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="openModal({{ $item->id }})"
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-xs font-medium rounded-lg text-primary bg-primary/10 hover:bg-primary hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                <i class="fas fa-eye mr-1.5"></i>
                                Detail
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center justify-center gap-3">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-folder-open text-2xl text-gray-300"></i>
                                </div>
                                <p class="text-gray-500 font-medium">Data tidak ditemukan</p>
                                <p class="text-xs text-gray-400">Coba ubah kata kunci pencarian Anda.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        @if($siswa->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
            <div class="flex items-center justify-center">
                @php
                    $current = $siswa->currentPage();
                    $last = $siswa->lastPage();
                    $start = max(1, $current - 2);
                    $end = min($last, $current + 2);
                    $searchParams = request()->has('search') ? '?search='.request('search') : '';
                @endphp

                <nav class="relative z-0 inline-flex rounded-lg shadow-sm -space-x-px" aria-label="Pagination">
                    
                    <!-- Tombol Previous -->
                    @if (!$siswa->onFirstPage())
                        <a href="{{ $siswa->previousPageUrl() }}{{ $searchParams }}" 
                           class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-primary transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-gray-300 bg-gray-50 text-sm font-medium text-gray-300 cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @endif

                    <!-- Halaman Awal (1) -->
                    @if($start > 1)
                        <a href="{{ $siswa->url(1) }}{{ $searchParams }}" 
                           class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                            1
                        </a>
                        @if($start > 2)
                            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-400">
                                ...
                            </span>
                        @endif
                    @endif

                    <!-- Loop Angka Halaman Tengah -->
                    @for($i = $start; $i <= $end; $i++)
                        @if($i == $current)
                            <span aria-current="page" 
                                  class="z-10 bg-primary border-primary text-white relative inline-flex items-center px-4 py-2 border text-sm font-bold">
                                {{ $i }}
                            </span>
                        @else
                            <a href="{{ $siswa->url($i) }}{{ $searchParams }}" 
                               class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hover:text-primary relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">
                                {{ $i }}
                            </a>
                        @endif
                    @endfor

                    <!-- Halaman Akhir -->
                    @if($end < $last)
                        @if($end < $last - 1)
                            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-400">
                                ...
                            </span>
                        @endif
                        <a href="{{ $siswa->url($last) }}{{ $searchParams }}" 
                           class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                            {{ $last }}
                        </a>
                    @endif

                    <!-- Tombol Next -->
                    @if ($siswa->hasMorePages())
                        <a href="{{ $siswa->nextPageUrl() }}{{ $searchParams }}" 
                           class="relative inline-flex items-center px-3 py-2 rounded-r-lg border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-primary transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-3 py-2 rounded-r-lg border border-gray-300 bg-gray-50 text-sm font-medium text-gray-300 cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif

                </nav>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- ================= MODAL ================= -->
<div id="modalDetail"
     class="fixed inset-0 z-50 hidden" 
     aria-labelledby="modal-title" 
     role="dialog" 
     aria-modal="true">
    
    <!-- Backdrop -->
    <div id="modalBackdrop"
         onclick="closeModal()"
         class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity opacity-0">
    </div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            
            <!-- Modal Panel -->
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 id="modalPanel">
                
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-primary to-purple-600 px-6 py-4 flex justify-between items-center text-white">
                    <h3 class="text-lg font-bold flex items-center gap-2">
                        <i class="fas fa-id-card"></i>
                        Detail Siswa
                    </h3>
                    <button onclick="closeModal()"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/20 hover:bg-white/30 transition-colors">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="px-6 py-6" id="modalContent">
                    <!-- Content Injected via JS -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
const siswaData = @json($siswaData);

function openModal(id) {
    const s = siswaData[id];
    const modal = document.getElementById('modalDetail');
    const backdrop = document.getElementById('modalBackdrop');
    const panel = document.getElementById('modalPanel');

    if (!s) {
        console.error('Data siswa tidak ditemukan:', id);
        return;
    }

    // Generate HTML Content
    let html = `
        <!-- Identitas Siswa -->
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-8 pb-6 border-b border-gray-100">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg shadow-primary/30 flex-shrink-0">
                ${s.nama.charAt(0).toUpperCase()}
            </div>
            <div class="text-center sm:text-left flex-1">
                <h3 class="text-2xl font-bold text-gray-800 mb-1">${s.nama}</h3>
                <p class="text-gray-500 font-mono mb-3">NIS: ${s.nis}</p>
                <div class="flex flex-wrap justify-center sm:justify-start gap-2">
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold border border-blue-100">
                        <i class="fas fa-graduation-cap mr-1"></i> ${s.kelas}
                    </span>
                    <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-xs font-semibold border border-purple-100">
                        <i class="fas fa-user-tie mr-1"></i> ${s.walikelas ?? '-'}
                    </span>
                </div>
            </div>
        </div>

        <!-- Grid Pelanggaran & Prestasi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Pelanggaran -->
            <div class="bg-red-50/50 rounded-xl border border-red-100 overflow-hidden">
                <div class="bg-red-100 px-4 py-3 border-b border-red-200">
                    <h4 class="font-bold text-red-800 text-sm flex items-center gap-2">
                        <i class="fas fa-exclamation-circle"></i> 
                        Pelanggaran (${s.pelanggaran.length})
                    </h4>
                </div>
                <div class="p-4 max-h-64 overflow-y-auto">
                    ${s.pelanggaran.length > 0 ? `
                        <div class="space-y-3">
                            ${s.pelanggaran.map(p => `
                                <div class="flex items-start gap-3 bg-white p-3 rounded-lg border border-red-100 shadow-sm">
                                    <div class="w-9 h-9 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                        <span class="font-bold text-red-600 text-xs">-${p.poin}</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-800">${p.nama}</p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            <i class="far fa-calendar-alt mr-1"></i> ${p.tanggal}
                                        </p>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    ` : `
                        <div class="text-center py-8 text-sm text-gray-400">
                            <i class="fas fa-check-circle text-green-400 text-2xl mb-2"></i>
                            <p>Tidak ada pelanggaran</p>
                        </div>
                    `}
                </div>
            </div>

            <!-- Prestasi -->
            <div class="bg-green-50/50 rounded-xl border border-green-100 overflow-hidden">
                <div class="bg-green-100 px-4 py-3 border-b border-green-200">
                    <h4 class="font-bold text-green-800 text-sm flex items-center gap-2">
                        <i class="fas fa-trophy"></i> 
                        Prestasi (${s.prestasi.length})
                    </h4>
                </div>
                <div class="p-4 max-h-64 overflow-y-auto">
                    ${s.prestasi.length > 0 ? `
                        <div class="space-y-3">
                            ${s.prestasi.map(p => `
                                <div class="flex items-start gap-3 bg-white p-3 rounded-lg border border-green-100 shadow-sm">
                                    <div class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                        <span class="font-bold text-green-600 text-xs">+${p.poin}</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-800">${p.nama}</p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            <i class="far fa-calendar-alt mr-1"></i> ${p.tanggal}
                                        </p>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    ` : `
                        <div class="text-center py-8 text-sm text-gray-400">
                            <i class="fas fa-info-circle text-blue-400 text-2xl mb-2"></i>
                            <p>Belum ada prestasi</p>
                        </div>
                    `}
                </div>
            </div>
        </div>
    `;

    document.getElementById('modalContent').innerHTML = html;
    
    // Show Modal dengan animasi
    modal.classList.remove('hidden');
    setTimeout(() => {
        backdrop.classList.remove('opacity-0');
        panel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
        panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
    }, 10);
}

function closeModal() {
    const modal = document.getElementById('modalDetail');
    const backdrop = document.getElementById('modalBackdrop');
    const panel = document.getElementById('modalPanel');

    backdrop.classList.add('opacity-0');
    panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
    panel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Close modal dengan ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modal = document.getElementById('modalDetail');
        if (!modal.classList.contains('hidden')) {
            closeModal();
        }
    }
});
</script>

@endsection