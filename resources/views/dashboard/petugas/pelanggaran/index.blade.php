@extends('dashboard.petugas.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-8 mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">Master Data Pelanggaran</h1>
            <p class="text-purple-200">Kelola jenis-jenis pelanggaran siswa</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('pelanggaran.create') }}" 
               class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Jenis Pelanggaran
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

<!-- Search & Filter -->
<div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
    <div class="flex flex-col lg:flex-row gap-4">
        <div class="flex-1">
            <div class="relative">
                <input type="text" 
                       id="searchInput"
                       placeholder="Cari berdasarkan nama pelanggaran atau kode..." 
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
        <h2 class="text-lg font-semibold text-gray-800">Daftar Pelanggaran</h2>
    </div>
    
    <div class="relative" style="max-height: 600px; overflow-y: auto;">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200 sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Nama Pelanggaran</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Poin</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="pelanggaranTableBody">
                @forelse($pelanggaran as $item)
                <tr class="hover:bg-gray-50 transition-colors" data-kategori="{{ $item->kategori }}">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                           
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4 text-center">
                        <span class="text-lg font-bold text-red-600">{{ $item->poin }}</span>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('pelanggaran.edit', $item->id) }}" 
                               class="text-indigo-600 hover:text-indigo-900 p-2 hover:bg-indigo-50 rounded-lg transition-colors"
                               title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('pelanggaran.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus jenis pelanggaran ini?')"
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data pelanggaran</h3>
                        <p class="text-gray-500 mb-4">Mulai dengan menambahkan jenis pelanggaran baru</p>
                        <a href="{{ route('pelanggaran.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Tambah Pelanggaran
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
const tableBody = document.getElementById('pelanggaranTableBody');

function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const kategoriValue = filterKategori.value.toLowerCase();
    const rows = tableBody.getElementsByTagName('tr');
    
    for (let row of rows) {
        if (row.querySelector('td[colspan]')) continue;
        
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