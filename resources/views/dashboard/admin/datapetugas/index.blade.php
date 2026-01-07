@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-4 md:p-6 lg:p-8 mb-6 md:mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-1 md:mb-2">Data Petugas</h1>
            <p class="text-sm md:text-base text-purple-200">Kelola data petugas di sekolah</p>
        </div>
        <div class="w-full md:w-auto">
            <a href="{{ route('datapetugas.create') }}" 
               class="w-full md:w-auto bg-white text-primary hover:bg-gray-50 px-4 md:px-6 py-2 md:py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Petugas
            </a>
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

<!-- Statistics Card -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
    <div class="bg-white rounded-xl shadow p-4 md:p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 md:w-12 md:h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                <svg class="w-6 h-6 md:w-6 md:h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Total Petugas</p>
        <h3 class="text-3xl font-bold text-primary">{{ $petugas->count() }}</h3>
    </div>
</div>

<!-- Search Bar -->
<div class="bg-white rounded-xl shadow-sm p-4 md:p-6 mb-6 md:mb-8 border border-gray-100">
    <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
        <div class="flex-1">
            <div class="relative">
                <input type="text" 
                       id="searchInput"
                       placeholder="Cari berdasarkan nama atau NK..." 
                       class="w-full pl-10 md:pl-11 pr-4 py-2.5 md:py-3 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400 absolute left-3 md:left-3.5 top-3 md:top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
        <button onclick="resetFilter()" class="px-4 md:px-5 py-2.5 md:py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors font-medium flex items-center justify-center gap-2 text-sm md:text-base">
            <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            <span class="hidden sm:inline">Reset</span>
        </button>
    </div>
</div>

<!-- Data Table -->
<div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">
    <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100">
        <h2 class="text-base md:text-lg font-semibold text-gray-800">Daftar Petugas</h2>
    </div>
    
    <div class="overflow-x-auto">
        <div class="relative" style="max-height: 600px; overflow-y: auto;">
            <table class="w-full min-w-full">
                <thead class="bg-gray-50 border-b border-gray-200 sticky top-0 z-10">
                    <tr>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">No</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">NK</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Nama</th>
                        <th class="px-3 md:px-6 py-3 md:py-4 text-center text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="petugasTableBody">
                    @forelse($petugas as $item)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-3 md:px-6 py-3 md:py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4 text-sm text-gray-600 whitespace-nowrap">
                            {{ $item->nk }}
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4">
                            <div class="flex items-center">
                                <div class="h-8 w-8 md:h-10 md:w-10 flex-shrink-0 rounded-full bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold text-xs md:text-sm">
                                    {{ strtoupper(substr($item->nama, 0, 2)) }}
                                </div>
                                <div class="ml-2 md:ml-3">
                                    <div class="text-xs md:text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 md:px-6 py-3 md:py-4">
                            <div class="flex items-center justify-center space-x-1 md:space-x-2">
                                <a href="{{ route('datapetugas.edit', $item->id) }}" 
                                   class="text-indigo-600 hover:text-indigo-900 p-1.5 md:p-2 hover:bg-indigo-50 rounded-lg transition-colors"
                                   title="Edit">
                                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('datapetugas.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Yakin hapus petugas ini?')"
                                            class="text-red-600 hover:text-red-900 p-1.5 md:p-2 hover:bg-red-50 rounded-lg transition-colors"
                                            title="Hapus">
                                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 md:px-6 py-8 md:py-12 text-center">
                            <svg class="w-12 h-12 md:w-16 md:h-16 text-gray-300 mx-auto mb-3 md:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <h3 class="text-base md:text-lg font-medium text-gray-900 mb-2">Belum ada data petugas</h3>
                            <p class="text-sm md:text-base text-gray-500 mb-3 md:mb-4">Mulai dengan menambahkan petugas baru</p>
                            <a href="{{ route('datapetugas.create') }}" class="bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-lg inline-flex items-center text-sm md:text-base">
                                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Tambah Petugas
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Search functionality
const searchInput = document.getElementById('searchInput');
const tableBody = document.getElementById('petugasTableBody');

function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const rows = tableBody.getElementsByTagName('tr');
    
    for (let row of rows) {
        if (row.querySelector('td[colspan]')) continue;
        
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    }
}

searchInput.addEventListener('keyup', filterTable);

function resetFilter() {
    searchInput.value = '';
    filterTable();
}
</script>
@endsection