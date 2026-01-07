@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-4 md:p-6 lg:p-8 mb-6 md:mb-8 text-white shadow-lg">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-1 md:mb-2">Jenis Pelanggaran</h1>
            <p class="text-sm md:text-base text-purple-200">Kelola jenis-jenis pelanggaran siswa</p>
        </div>
        <div class="w-full md:w-auto">
            <a href="{{ route('jenispelanggaran.create') }}" 
               class="w-full md:w-auto bg-white text-primary hover:bg-gray-50 px-4 md:px-6 py-2 md:py-3 rounded-lg font-semibold inline-flex items-center justify-center transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Jenis Pelanggaran
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
        <h2 class="text-base md:text-lg font-semibold text-gray-800">Daftar Jenis Pelanggaran</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">No</th>
                    <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Nama Pelanggaran</th>
                    <th class="px-3 md:px-6 py-3 md:py-4 text-left text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Poin</th>
                    <th class="px-3 md:px-6 py-3 md:py-4 text-center text-xs font-semibold text-gray-600 uppercase whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($pelanggaran as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-3 md:px-6 py-3 md:py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-3 md:px-6 py-3 md:py-4">
                        <div class="flex items-center">
                            <div class="h-8 w-8 md:h-10 md:w-10 flex-shrink-0 rounded-lg bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold text-xs md:text-sm">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                            </div>
                            <div class="ml-2 md:ml-3">
                                <div class="text-xs md:text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 md:px-6 py-3 md:py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" clip-rule="evenodd"/>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                            </svg>
                            -{{ $item->poin }}
                        </span>
                    </td>
                    <td class="px-3 md:px-6 py-3 md:py-4">
                        <div class="flex items-center justify-center space-x-1 md:space-x-2">
                            <a href="{{ route('jenispelanggaran.edit', $item->id) }}" 
                               class="text-indigo-600 hover:text-indigo-900 p-1.5 md:p-2 hover:bg-indigo-50 rounded-lg transition-colors"
                               title="Edit">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('jenispelanggaran.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus jenis pelanggaran ini?')"
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        <h3 class="text-base md:text-lg font-medium text-gray-900 mb-2">Belum ada data jenis pelanggaran</h3>
                        <p class="text-sm md:text-base text-gray-500 mb-3 md:mb-4">Mulai dengan menambahkan jenis pelanggaran baru</p>
                        <a href="{{ route('jenispelanggaran.create') }}" class="bg-primary hover:bg-purple-700 text-white px-4 py-2 rounded-lg inline-flex items-center text-sm md:text-base">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Tambah Jenis Pelanggaran
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection