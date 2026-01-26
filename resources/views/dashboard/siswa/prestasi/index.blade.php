@extends('dashboard.siswa.main')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Prestasi Saya</h2>
                <p class="text-gray-600">Riwayat prestasi yang telah diverifikasi</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500">Total Poin</p>
                    <p class="text-2xl font-bold text-green-600">+{{ $totalPoinPrestasi ?? 0 }}</p>
                </div>
                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                    <i class="fas fa-check-circle mr-1"></i> Terverifikasi
                </span>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl shadow p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                    <i class="fas fa-trophy text-green-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Prestasi</p>
                    <p class="text-xl font-bold text-gray-800">{{ $data->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-blue-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Terakhir Update</p>
                    <p class="text-sm font-semibold text-gray-800">
                        @if($data->count() > 0 && $data->first()->verified_at)
                            {{ \Carbon\Carbon::parse($data->first()->verified_at)->format('d M Y') }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                    <i class="fas fa-star text-purple-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Rata-rata Poin</p>
                    <p class="text-xl font-bold text-purple-600">+{{ $rataRataPoin ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Prestasi</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Prestasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Poin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($data as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-600">{{ $loop->iteration }}</td>

                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-800">{{ $item->jenis->nama }}</div>
                            <div class="text-xs text-gray-500">{{ $item->jenis->kategori ?? 'Umum' }}</div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                +{{ $item->jenis->poin }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-gray-600 max-w-xs">
                            {{ $item->keterangan ?? '-' }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-800">
                                {{ $item->verified_at ? \Carbon\Carbon::parse($item->verified_at)->format('d M Y') : '-' }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                @if($item->foto)
                                <button onclick="showImageModal('{{ asset('storage/'.$item->foto) }}', '{{ $item->jenis->nama }}')"
                                        class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="{{ asset('storage/'.$item->foto) }}" 
                                   target="_blank"
                                   class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-download"></i>
                                </a>
                                @else
                                <span class="text-gray-400">-</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-trophy text-gray-300 text-4xl mb-3"></i>
                                <p class="text-gray-500 font-medium">Belum ada prestasi</p>
                                <p class="text-sm text-gray-400 mt-1">Ikuti kegiatan positif untuk mendapatkan poin</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($data->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $data->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-xl max-w-2xl w-full">
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h3 class="font-semibold text-gray-800" id="modalTitle"></h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-6">
            <img id="modalImage" src="" class="w-full h-auto rounded-lg">
        </div>
    </div>
</div>

@push('scripts')
<script>
function showImageModal(imageSrc, title) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('imageModal').classList.remove('hidden');
    document.getElementById('imageModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.getElementById('imageModal').classList.remove('flex');
}

// Close modal on ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeModal();
});
</script>
@endpush
@endsection