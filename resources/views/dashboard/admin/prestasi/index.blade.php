@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-4 md:p-6 lg:p-8 mb-6 md:mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-1 md:mb-2">Data Prestasi</h1>
            <p class="text-sm md:text-base text-purple-200">Kelola data prestasi siswa</p>
        </div>
        <div class="w-full md:w-auto">
            @if(in_array(auth()->user()->role, ['admin','petugas']))
            <a href="{{ route('prestasi.create') }}" 
               class="w-full md:w-auto bg-white text-primary hover:bg-gray-50 px-4 md:px-6 py-2 md:py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Prestasi
            </a>
            @endif
        </div>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="bg-green-50 border border-green-200 rounded-lg p-3 md:p-4 mb-4 md:mb-6">
    <div class="flex">
        <svg class="w-4 h-4 md:w-5 md:h-5 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <p class="ml-2 md:ml-3 text-xs md:text-sm text-green-700">{{ session('success') }}</p>
    </div>
</div>
@endif

<!-- Data Table -->
<div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">
    <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100">
        <h2 class="text-base md:text-lg font-semibold text-gray-800">Daftar Prestasi Siswa</h2>
    </div>
    
    <div class="overflow-x-auto">
        <div class="relative" style="max-height: 600px; overflow-y: auto;">
            <table class="w-full min-w-full">
                <thead class="bg-gray-50 border-b border-gray-200 sticky top-0 z-10">
                    <tr>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">No</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Siswa</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Prestasi</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Poin</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Keterangan</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Foto</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Pelapor</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Status</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-center text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="prestasiTableBody">
                    @forelse($prestasi as $item)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 md:px-6 py-3 md:py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4">
                            <div class="flex items-center">
                                <div class="h-8 w-8 md:h-10 md:w-10 flex-shrink-0 rounded-full bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold text-xs md:text-sm">
                                    {{ strtoupper(substr($item->siswa->nama, 0, 2)) }}
                                </div>
                                <div class="ml-2 md:ml-3">
                                    <div class="text-xs md:text-sm font-medium text-gray-900">{{ $item->siswa->nama }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->siswa->kelas->nama_kelas }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4 text-sm text-gray-900">
                            {{ $item->jenis->nama }}
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                                </svg>
                                +{{ $item->jenis->poin }}
                            </span>
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4">
                            @if($item->keterangan)
                            <button 
                                onclick="openKeterangan(`{{ $item->keterangan }}`)"
                                class="text-indigo-600 hover:text-indigo-900 p-1.5 md:p-2 hover:bg-indigo-50 rounded-lg transition-colors"
                                title="Lihat Keterangan">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4 text-center">
                            @if($item->foto)
                            <img 
                                src="{{ asset('storage/'.$item->foto) }}"
                                alt="Foto Prestasi"
                                class="w-12 h-12 md:w-16 md:h-16 object-cover rounded-lg cursor-pointer hover:scale-105 transition-all duration-200 shadow-sm"
                                onclick="openImage('{{ asset('storage/'.$item->foto) }}')"
                            >
                            @else
                            <span class="text-gray-400 italic text-xs md:text-sm">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            {{ $item->pelapor }}
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                {{ $item->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $item->status == 'diterima' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $item->status == 'ditolak' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ strtoupper($item->status) }}
                            </span>
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4">
                            @if(in_array(auth()->user()->role, ['admin','bk']) && $item->status == 'pending')
                            <form method="POST"
                                  action="{{ route('prestasi.verifikasi', $item->id) }}"
                                  class="flex gap-1 md:gap-2">
                                @csrf
                                @method('PATCH')
                                <button name="status" value="diterima"
                                    class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded text-xs transition-colors">
                                    Terima
                                </button>
                                <button name="status" value="ditolak"
                                    class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs transition-colors">
                                    Tolak
                                </button>
                            </form>
                            @else
                            <span class="text-gray-400 text-xs">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 md:px-6 py-8 md:py-12 text-center">
                            <svg class="w-12 h-12 md:w-16 md:h-16 text-gray-300 mx-auto mb-3 md:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="text-base md:text-lg font-medium text-gray-900 mb-2">Belum ada data prestasi</h3>
                            <p class="text-sm md:text-base text-gray-500 mb-3 md:mb-4">Mulai dengan menambahkan data prestasi baru</p>
                            @if(in_array(auth()->user()->role, ['admin','petugas']))
                            <a href="{{ route('prestasi.create') }}" class="bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-lg inline-flex items-center text-sm md:text-base">
                                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Tambah Prestasi
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL KETERANGAN -->
<div id="keteranganModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4" onclick="closeKeterangan(event)">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="keteranganModalContent" onclick="event.stopPropagation()">
        <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Keterangan Prestasi
            </h3>
            <button onclick="closeKeterangan()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="p-4 md:p-5">
            <p id="keteranganText" class="text-gray-700 text-sm md:text-base leading-relaxed"></p>
        </div>
        <div class="px-4 md:px-5 py-3 md:py-4 bg-gray-50 rounded-b-xl">
            <button onclick="closeKeterangan()" class="w-full px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors font-medium text-sm">
                Tutup
            </button>
        </div>
    </div>
</div>

<!-- MODAL FOTO -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-85 hidden items-center justify-center z-50 p-4" onclick="closeImage(event)">
    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full transform transition-all duration-300 scale-95 opacity-0" id="imageModalContent" onclick="event.stopPropagation()">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Foto Prestasi
            </h3>
            <button onclick="closeImage()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <!-- Image Container -->
        <div class="p-6 bg-gray-50 flex items-center justify-center" style="min-height: 400px; max-height: 70vh;">
            <div class="relative w-full h-full flex items-center justify-center">
                <img id="modalImage" 
                     class="max-w-full max-h-full object-contain rounded-lg shadow-lg" 
                     alt="Foto Prestasi"
                     style="width: auto; height: auto; max-width: 100%; max-height: 60vh;">
            </div>
        </div>
        
        <!-- Footer -->
        <div class="px-4 py-3 bg-gray-50 rounded-b-2xl flex justify-end">
            <button onclick="closeImage()" 
                    class="px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors font-medium text-sm">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
function openKeterangan(text) {
    const modal = document.getElementById('keteranganModal');
    const content = document.getElementById('keteranganModalContent');
    document.getElementById('keteranganText').innerText = text;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeKeterangan(event) {
    if (event && event.target !== event.currentTarget && !event.target.closest('#keteranganModalContent')) {
        return;
    }
    
    const modal = document.getElementById('keteranganModal');
    const content = document.getElementById('keteranganModalContent');
    
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}

function openImage(src) {
    const modal = document.getElementById('imageModal');
    const content = document.getElementById('imageModalContent');
    const img = document.getElementById('modalImage');
    
    img.src = src;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeImage(event) {
    if (event && event.target !== event.currentTarget && !event.target.closest('#imageModalContent')) {
        return;
    }
    
    const modal = document.getElementById('imageModal');
    const content = document.getElementById('imageModalContent');
    
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}
</script>
@endsection