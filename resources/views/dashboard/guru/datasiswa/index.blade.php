@extends('dashboard.guru.main')

@section('content')
<main class="flex-1 overflow-y-auto p-6 bg-gray-50">
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-8 mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">Data Siswa</h1>
            <p class="text-purple-200">Kelola dan pantau informasi siswa di sekolah</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('datasiswa.create') }}" 
               class="bg-white text-primary hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold inline-flex items-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Siswa Baru
            </a>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow p-6 border border-gray-100 hover:shadow-md transition-shadow card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-green-500 bg-green-100 px-2 py-1 rounded-full">+12%</span>
        </div>
        <div>
            <p class="text-gray-500 text-sm">Total Siswa</p>
            <h3 class="text-3xl font-bold text-primary">{{ $siswa->count() }}</h3>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow p-6 border border-gray-100 hover:shadow-md transition-shadow card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                <svg class="w-7 h-7 text-primary" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-green-500 bg-green-100 px-2 py-1 rounded-full">+8%</span>
        </div>
        <div>
            <p class="text-gray-500 text-sm">Siswa Laki-laki</p>
            <h3 class="text-3xl font-bold text-primary">{{ $siswa->where('jk', 'L')->count() }}</h3>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow p-6 border border-gray-100 hover:shadow-md transition-shadow card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                <svg class="w-7 h-7 text-primary" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-red-500 bg-red-100 px-2 py-1 rounded-full">-2%</span>
        </div>
        <div>
            <p class="text-gray-500 text-sm">Siswa Perempuan</p>
            <h3 class="text-3xl font-bold text-primary">{{ $siswa->where('jk', 'P')->count() }}</h3>
        </div>
    </div>
</div>

<!-- Search and Filter -->
<div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
    <div class="flex flex-col lg:flex-row gap-4">
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
        <div class="flex gap-3">
            <select id="filterJK" class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent bg-white">
                <option value="">Semua Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            <button onclick="resetFilter()" class="px-5 py-3 bg-gray-200 text-gray-700 rounded-lg transition-colors font-medium hover:bg-gray-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Data Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
    <div class="overflow-x-auto">
        <table class="w-full" id="studentTable">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIS</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Siswa</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis Kelamin</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="studentTableBody">
                @forelse($siswa as $s)
                <tr class="hover:bg-gray-50 transition-colors" data-jk="{{ $s->jk }}">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $s->nis }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0 rounded-full bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold text-sm">
                                {{ strtoupper(substr($s->nama, 0, 2)) }}
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $s->nama }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @if($s->jk == 'L')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            Laki-laki
                        </span>
                        @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            Perempuan
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-xs font-medium">{{ $s->kelas }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('datasiswa.edit', $s->id) }}" 
                               class="text-indigo-600 hover:text-indigo-900 p-2 hover:bg-indigo-50 rounded-lg transition-colors" 
                               title="Edit Data">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button onclick="confirmDelete({{ $s->id }})" 
                                    class="text-red-600 hover:text-red-900 p-2 hover:bg-red-50 rounded-lg transition-colors" 
                                    title="Hapus Data">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada data siswa</h3>
                            <p class="text-gray-500 mb-4">Mulai dengan menambahkan siswa baru</p>
                            <a href="{{ route('datasiswa.create') }}" class="bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Tambah Siswa Baru
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Empty State untuk Search -->
    <div id="emptySearch" class="hidden px-6 py-12 text-center">
        <div class="flex flex-col items-center justify-center">
            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada hasil pencarian</h3>
            <p class="text-gray-500">Coba ubah kata kunci pencarian atau filter</p>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-14 w-14 rounded-full bg-red-100 mb-4">
                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Konfirmasi Hapus</h3>
            <p class="text-gray-500 mb-6">Apakah Anda yakin ingin menghapus data siswa ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex space-x-3">
                <button onclick="closeDeleteModal()" 
                        class="flex-1 px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg font-medium transition-colors">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

<script>
// Search functionality
const searchInput = document.getElementById('searchInput');
const filterJK = document.getElementById('filterJK');
const tableBody = document.getElementById('studentTableBody');
const emptySearch = document.getElementById('emptySearch');

function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const jkValue = filterJK.value;
    const rows = tableBody.getElementsByTagName('tr');
    let visibleCount = 0;
    
    for (let row of rows) {
        if (row.querySelector('td[colspan]')) continue; // Skip empty state row
        
        const text = row.textContent.toLowerCase();
        const jk = row.dataset.jk;
        
        const matchSearch = text.includes(searchValue);
        const matchJK = !jkValue || jk === jkValue;
        
        if (matchSearch && matchJK) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    }
    
    // Show/hide empty state
    if (visibleCount === 0 && (searchValue || jkValue)) {
        emptySearch.classList.remove('hidden');
    } else {
        emptySearch.classList.add('hidden');
    }
}

searchInput.addEventListener('keyup', filterTable);
filterJK.addEventListener('change', filterTable);

function resetFilter() {
    searchInput.value = '';
    filterJK.value = '';
    filterTable();
}

// Delete modal
function confirmDelete(id) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    form.action = `/datasiswa/${id}`;
    modal.classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});
</script>
@endsection