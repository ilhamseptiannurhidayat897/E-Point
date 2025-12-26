@extends('dashboard.petugas.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-8 mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">Master Data Kebaikan</h1>
            <p class="text-purple-200">Kelola jenis-jenis kebaikan dan prestasi siswa</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('kebaikan.create') }}" 
               class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Jenis Kebaikan
            </a>
        </div>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
    <div class="flex">
        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <p class="ml-3 text-sm text-green-700">{{ session('success') }}</p>
    </div>
</div>
@endif

<!-- Statistics Cards -->
{{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Total Jenis Kebaikan</p>
        <h3 class="text-3xl font-bold text-primary">{{ $kebaikan->count() }}</h3>
    </div>
    
    <div class="bg-white rounded-xl shadow p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Kategori Kecil</p>
        <h3 class="text-3xl font-bold text-primary">{{ $kebaikan->where('kategori', 'kecil')->count() }}</h3>
    </div>
    
    <div class="bg-white rounded-xl shadow p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Kategori Sedang</p>
        <h3 class="text-3xl font-bold text-primary">{{ $kebaikan->where('kategori', 'sedang')->count() }}</h3>
    </div>
    
    <div class="bg-white rounded-xl shadow p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Kategori Besar</p>
        <h3 class="text-3xl font-bold text-primary">{{ $kebaikan->where('kategori', 'besar')->count() }}</h3>
    </div>
</div> --}}

<!-- Search & Filter -->
<div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
    <div class="flex flex-col lg:flex-row gap-4">
        <div class="flex-1">
            <div class="relative">
                <input type="text" 
                       id="searchInput"
                       placeholder="Cari berdasarkan nama kebaikan atau kode..." 
                       class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
       
    </div>
</div>

<!-- Data Table -->
<div class="bg-white rounded-xl shadow border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-800">Daftar Kebaikan</h2>
    </div>
    
    <div class="relative" style="max-height: 600px; overflow-y: auto;">
        <table class="w-full" id="kebaikanTable">
            <thead class="bg-gray-50 border-b border-gray-200 sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Nama Kebaikan</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Poin</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="kebaikanTableBody">
                @forelse($kebaikan as $item)
                <tr class="hover:bg-gray-50 transition-colors" data-kategori="{{ $item->kategori }}">
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                            {{ $item->code }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                           
                               
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                            </div>
                        </div>
                    </td>
                  
                    <td class="px-6 py-4 text-center">
                        <span class="text-lg font-bold text-green-600">+{{ $item->poin }}</span>
                    </td>
                    
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('kebaikan.edit', $item->id) }}" 
                               class="text-indigo-600 hover:text-indigo-900 p-2 hover:bg-indigo-50 rounded-lg transition-colors"
                               title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('kebaikan.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus jenis kebaikan ini?')"
                                        class="text-red-600 hover:text-red-900 p-2 hover:bg-red-50 rounded-lg transition-colors"
                                        title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data kebaikan</h3>
                        <p class="text-gray-500 mb-4">Mulai dengan menambahkan jenis kebaikan baru</p>
                        <a href="{{ route('kebaikan.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Tambah Kebaikan
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
// Search functionality
const searchInput = document.getElementById('searchInput');
const filterKategori = document.getElementById('filterKategori');
const tableBody = document.getElementById('kebaikanTableBody');

function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const kategoriValue = filterKategori.value.toLowerCase();
    const rows = tableBody.getElementsByTagName('tr');
    
    for (let row of rows) {
        if (row.querySelector('td[colspan]')) continue; // Skip empty state
        
        const text = row.textContent.toLowerCase();
        const kategori = row.dataset.kategori.toLowerCase();
        
        const matchSearch = text.includes(searchValue);
        const matchKategori = !kategoriValue || kategori === kategoriValue;
        
        row.style.display = (matchSearch && matchKategori) ? '' : 'none';
    }
}

searchInput.addEventListener('keyup', filterTable);
filterKategori.addEventListener('change', filterTable);

function resetFilter() {
    searchInput.value = '';
    filterKategori.value = '';
    filterTable();
}
</script>
@endsection