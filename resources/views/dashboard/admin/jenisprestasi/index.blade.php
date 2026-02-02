@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-4 md:p-6 lg:p-8 mb-6 md:mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-1 md:mb-2">Jenis Prestasi</h1>
            <p class="text-sm md:text-base text-purple-200">Kelola jenis-jenis prestasi siswa</p>
        </div>
        <div class="w-full md:w-auto">
            <a href="{{ route('jenisprestasi.create') }}" 
               class="w-full md:w-auto bg-white text-primary hover:bg-gray-50 px-4 md:px-6 py-2 md:py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Jenis Prestasi
            </a>
            <a href="{{ route('jenisprestasi.import') }}" 
               class="w-full md:w-auto bg-white text-primary hover:bg-gray-50 px-4 md:px-6 py-2 md:py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Import Jenis Prestasi
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

<!-- Data Table -->
<div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">
    <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100">
        <h2 class="text-base md:text-lg font-semibold text-gray-800">Daftar Jenis Prestasi</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">No</th>
                    <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Nama Prestasi</th>
                    <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Poin</th>
                    <th class="px-3 md:px-6 py-3 md:py-4 text-center text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($prestasi as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-3 md:px-6 py-3 md:py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-3 md:px-6 py-3 md:py-4">
                        <div class="flex items-center">
                            <div class="h-8 w-8 md:h-10 md:w-10 flex-shrink-0 rounded-lg bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold text-xs md:text-sm">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-2 md:ml-3">
                                <div class="text-xs md:text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 md:px-6 py-3 md:py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                            </svg>
                            +{{ $item->poin }}
                        </span>
                    </td>
                    <td class="px-3 md:px-6 py-3 md:py-4">
                        <div class="flex items-center justify-center space-x-1 md:space-x-2">
                            <a href="{{ route('jenisprestasi.edit', $item->id) }}" 
                               class="text-indigo-600 hover:text-indigo-900 p-1.5 md:p-2 hover:bg-indigo-50 rounded-lg transition-colors"
                               title="Edit">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('jenisprestasi.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="button"
                                    onclick="openDeleteModal({{ $item->id }})"
                                    class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition"
                                >
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="text-base md:text-lg font-medium text-gray-900 mb-2">Belum ada data jenis prestasi</h3>
                        <p class="text-sm md:text-base text-gray-500 mb-3 md:mb-4">Mulai dengan menambahkan jenis prestasi baru</p>
                        <a href="{{ route('jenisprestasi.create') }}" class="bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-lg inline-flex items-center text-sm md:text-base">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Tambah Jenis Prestasi
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-[#1f143a]/50 backdrop-blur-sm">

    <div
        class="bg-white/95 w-full max-w-md rounded-2xl shadow-2xl p-6 text-center border border-gray-100">

        <!-- Icon -->
        <div
            class="mx-auto mb-4 h-14 w-14 rounded-full bg-red-50 flex items-center justify-center">
            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor"
                 stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 7V4h6v3M4 7h16"/>
            </svg>
        </div>

        <!-- Text -->
        <h3 class="text-lg font-semibold text-gray-900 mb-1">
            Konfirmasi Penghapusan
        </h3>
        <p class="text-sm text-gray-500 mb-6">
            Data <span class="text-red-500 font-medium">akan dihapus permanen</span>
            dan tidak bisa dikembalikan.
        </p>

        <!-- Action -->
        <div class="flex justify-center gap-3">
            <button onclick="closeDeleteModal()"
                class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition">
                Batal
            </button>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button
                    class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 shadow-md text-white font-medium shadow-sm transition">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function openDeleteModal(id) {
    document.getElementById('deleteModal').classList.remove('hidden')
    document.getElementById('deleteModal').classList.add('flex')
    document.getElementById('deleteForm').action = `/admin/jenisprestasi/${id}`
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden')
}
</script>

@endsection