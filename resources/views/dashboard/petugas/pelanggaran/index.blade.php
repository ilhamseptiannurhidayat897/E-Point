@extends('dashboard.petugas.main')

@section('content')

<!-- Header -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">
            Riwayat Pelanggaran
        </h1>
        <a href="{{ route('inputpelanggaran.create') }}" 
           class="flex items-center gap-2 bg-gradient-to-r from-primary to-purple-600 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all">
            <i class="fas fa-plus"></i>
            <span>Input Baru</span>
        </a>
    </div>
</div>

<!-- Success Alert -->
@if(session('success'))
<div class="bg-gradient-to-r from-primary/10 to-purple-600/10 border border-primary/20 text-primary rounded-xl p-4 mb-6 flex items-center gap-3">
    <i class="fas fa-check-circle"></i>
    <p class="font-medium">{{ session('success') }}</p>
</div>
@endif

<!-- Table -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-primary/5 to-purple-600/5">
                <tr>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Siswa</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Jenis Pelanggaran</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Poin</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Status</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold text-gray-700">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($pelanggaran as $p)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $p->siswa->nama }}</p>
                            <p class="text-xs text-gray-500">{{ $p->siswa->kelas->nama_kelas ?? '-' }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $p->jenispelanggaran->nama ?? '-' }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-bold text-primary">
                            -{{ $p->jenispelanggaran->poin ?? 0 }} Poin
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($p->status == 'pending')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-amber-50 text-amber-600 border border-amber-200">
                            <i class="fas fa-clock text-xs"></i>
                            Pending
                        </span>
                        @elseif($p->status == 'verified')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-primary/10 text-primary border border-primary/20">
                            <i class="fas fa-check-circle text-xs"></i>
                            Terverifikasi
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-gray-100 text-gray-600 border border-gray-200">
                            {{ ucfirst($p->status) }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $p->created_at->format('d M Y, H:i') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="bg-gray-100 p-6 rounded-2xl mb-4">
                                <i class="fas fa-inbox text-gray-400 text-5xl"></i>
                            </div>
                            <p class="text-gray-500 font-medium mb-2">Belum ada data pelanggaran</p>
                            <p class="text-sm text-gray-400">Mulai input pelanggaran siswa</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if(method_exists($pelanggaran, 'links'))
    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        {{ $pelanggaran->links() }}
    </div>
    @endif
</div>

@endsection