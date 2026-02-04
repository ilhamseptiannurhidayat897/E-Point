@extends('dashboard.siswa.main')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Prestasi Saya</h2>
                <p class="text-gray-600">Riwayat prestasi yang telah diverifikasi</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500">Total Poin</p>
                    <p class="text-2xl font-bold text-emerald-600">+{{ $totalPoinPrestasi ?? 0 }}</p>
                </div>
                <span class="px-3 py-1.5 bg-emerald-50 text-emerald-700 rounded-lg text-sm font-medium border border-emerald-100">
                    <i class="fas fa-check-circle mr-2"></i> Terverifikasi
                </span>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center border border-emerald-100">
                    <i class="fas fa-trophy text-emerald-600 text-lg"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Prestasi</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $data->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center border border-blue-100">
                    <i class="fas fa-calendar-alt text-blue-600 text-lg"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Terakhir Update</p>
                    <p class="text-base font-semibold text-gray-800">
                        @if($data->count() > 0 && $data->first()->verified_at)
                            {{ \Carbon\Carbon::parse($data->first()->verified_at)->format('d M Y') }}
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center border border-purple-100">
                    <i class="fas fa-star text-purple-600 text-lg"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Rata-rata Poin</p>
                    <p class="text-2xl font-bold text-purple-600">
                        @if($data->count() > 0)
                            +{{ number_format($data->avg('jenis.poin'), 1) }}
                        @else
                            0
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Prestasi</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Bukti</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis Prestasi</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Poin</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Keterangan</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($data as $item)
                    <tr class="hover:bg-emerald-50/50 transition-colors">
                        <td class="px-6 py-4 text-gray-600 font-medium">{{ $loop->iteration }}</td>

                        <!-- Kolom Bukti -->
                        <td class="px-6 py-4">
                            @if($item->foto)
                            <button onclick="showImageModal('{{ asset('storage/'.$item->foto) }}', '{{ $item->jenis->nama }}')"
                                    class="group relative focus:outline-none">
                                <img src="{{ asset('storage/'.$item->foto) }}"
                                     class="w-16 h-16 object-cover rounded-lg border-2 border-gray-200 shadow-sm hover:border-emerald-300 transition-all">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg flex items-center justify-center transition-all duration-200">
                                    <i class="fas fa-search-plus text-white opacity-0 group-hover:opacity-100 text-sm"></i>
                                </div>
                            </button>
                            @else
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm bg-gray-100 text-gray-600 border border-gray-200">
                                <i class="fas fa-image mr-2 text-gray-400"></i>
                                Tidak ada
                            </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-800">{{ $item->jenis->nama }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ $item->jenis->kategori ?? 'Umum' }}</div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <i class="fas fa-plus mr-2 text-xs"></i>
                                +{{ $item->jenis->poin }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-gray-600 max-w-xs line-clamp-2">
                                {{ $item->keterangan ?? '-' }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-800">
                                {{ $item->verified_at ? \Carbon\Carbon::parse($item->verified_at)->format('d M Y') : '-' }}
                            </div>
                            <div class="text-xs text-gray-500 mt-0.5">
                                {{ $item->verified_at ? \Carbon\Carbon::parse($item->verified_at)->format('H:i') : '' }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            @if($item->foto)
                            <a href="{{ asset('storage/'.$item->foto) }}" 
                               target="_blank"
                               class="inline-flex items-center text-emerald-600 hover:text-emerald-800 hover:bg-emerald-50 px-3 py-2 rounded-lg transition-all border border-emerald-200"
                               title="Download Sertifikat/Foto">
                                <i class="fas fa-download mr-2"></i>
                                Download
                            </a>
                            @else
                            <span class="inline-flex items-center text-gray-400 px-3 py-2 rounded-lg border border-gray-200"
                                  title="Tidak ada dokumen">
                                <i class="fas fa-download mr-2"></i>
                                Tidak ada
                            </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-trophy text-gray-300 text-5xl mb-4"></i>
                                <p class="text-gray-500 font-medium text-lg mb-1">Belum ada prestasi</p>
                                <p class="text-sm text-gray-400">Ikuti kegiatan positif untuk mendapatkan poin</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($data->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
            {{ $data->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-xl max-w-3xl w-full shadow-2xl">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50 rounded-t-xl">
            <h3 class="font-semibold text-gray-800 text-lg" id="modalTitle"></h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 hover:bg-gray-100 w-8 h-8 rounded-lg flex items-center justify-center transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="p-6">
            <img id="modalImage" src="" class="w-full h-auto rounded-lg border border-gray-200">
        </div>
    </div>
</div>

@push('scripts')
<script>
function showImageModal(imageSrc, title) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalTitle').textContent = 'Bukti Prestasi: ' + title;
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

// Close modal on background click
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target.id === 'imageModal') closeModal();
});
</script>
@endpush
@endsection