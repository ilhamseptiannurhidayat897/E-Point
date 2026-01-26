@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-6 md:p-8 mb-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div class="space-y-2">
            <h1 class="text-2xl md:text-3xl font-bold">Data Siswa</h1>
            <p class="text-purple-200">Kelola data siswa di sekolah</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('datasiswa.excel') }}" 
               class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Export Excel            
            </a>
            <a href="{{ route('datasiswa.pdf') }}" 
               class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Export PDF            
            </a>
            <a href="{{ route('datasiswa.create') }}" 
               class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Siswa
            </a>
            <a href="{{ route('datasiswa.import') }}" 
               class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Import Siswa
            </a>
        </div>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6 shadow-sm">
    <div class="flex items-center">
        <svg class="w-5 h-5 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <p class="ml-3 text-sm text-green-700">{{ session('success') }}</p>
    </div>
</div>
@endif

<!-- Statistics Card -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-xl bg-purple-100 flex items-center justify-center">
                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm mb-1">Total Siswa</p>
        <h3 class="text-3xl font-bold text-primary">{{ $siswa->count() }}</h3>
    </div>
</div>

<!-- Search Bar -->
<div class="bg-white rounded-xl shadow-md p-6 mb-8 border border-gray-100">
    <div class="flex flex-col sm:flex-row gap-4">
        <div class="flex-1">
            <div class="relative">
                <input type="text" 
                       id="searchInput"
                       placeholder="Cari berdasarkan nama, NIS, atau kelas..." 
                       class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
        <button onclick="resetFilter()" class="px-5 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-colors font-medium flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            <span class="hidden sm:inline">Reset</span>
        </button>
    </div>
</div>

<!-- Data Table -->
<div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-800">Daftar Siswa</h2>
    </div>
    
    <div class="overflow-x-auto">
        <div class="relative" style="max-height: 600px; overflow-y: auto;">
            <table class="w-full min-w-full">
                <thead class="bg-gray-50 border-b border-gray-200 sticky top-0 z-10">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">NIS</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">JK</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Kelas</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Wali Kelas</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="siswaTableBody">
                    @forelse($siswa as $item)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                            {{ $item->nis }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 rounded-full bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr($item->nama, 0, 2)) }}
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($item->jk == 'L')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                </svg>
                                L
                            </span>
                            @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                </svg>
                                P
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                            <span class="px-3 py-1 bg-gray-100 rounded-full text-xs font-medium">{{ $item->kelas->nama_kelas }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                            {{ $item->kelas->waliKelas->nama ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('datasiswa.edit', $item->id) }}" 
                                   class="text-indigo-600 hover:text-indigo-900 p-2 hover:bg-indigo-50 rounded-lg transition-colors"
                                   title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('datasiswa.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Hapus data siswa?')"
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
                        <td colspan="7" class="px-6 py-12 text-center">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data siswa</h3>
                            <p class="text-gray-500 mb-4">Mulai dengan menambahkan siswa baru</p>
                            <a href="{{ route('datasiswa.create') }}" class="bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Tambah Siswa
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
const tableBody = document.getElementById('siswaTableBody');

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