@extends('dashboard.wali_kelas.main')

@section('content')
<div class="px-4 py-3">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('wali_kelas.siswa.index') }}" 
                   class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-1">
                        Detail Siswa
                    </h1>
                    <p class="text-sm text-gray-500">
                        Informasi lengkap dan rekam jejak siswa
                    </p>
                </div>
            </div>
            <div class="bg-gradient-to-br from-primary to-purple-600 p-4 rounded-xl shadow-lg">
                <i class="fas fa-user-graduate text-white text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Student Profile Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
        <div class="flex items-center gap-4 pb-6 border-b">
            <div class="w-20 h-20 bg-gradient-to-br from-primary to-purple-600 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                {{ substr($siswa->nama, 0, 1) }}
            </div>
            <div class="flex-1">
                <h2 class="text-2xl font-bold text-gray-800">{{ $siswa->nama }}</h2>
                <p class="text-gray-500">NIS: {{ $siswa->nis }}</p>
                <div class="mt-2 flex items-center gap-4">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-primary/10 text-primary border border-primary/20">
                        <i class="fas fa-graduation-cap text-xs"></i>
                        {{ $siswa->kelas->nama_kelas }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Pelanggaran Section -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-rose-500 to-pink-600 px-6 py-4">
            <h3 class="text-xl font-bold text-white flex items-center gap-2">
                <i class="fas fa-exclamation-triangle"></i>
                Riwayat Pelanggaran
            </h3>
        </div>
        <div class="p-6">
            @forelse ($siswa->pelanggaran as $p)
                <div class="flex items-center justify-between p-4 bg-rose-50 rounded-lg border border-rose-100 mb-3 hover:bg-rose-100 transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-rose-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-times text-rose-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $p->jenisPelanggaran->nama }}</p>
                            <p class="text-xs text-gray-500">{{ $p->tanggal->format('d M Y') ?? 'Tanggal tidak tersedia' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-rose-600 font-bold">-{{ $p->jenisPelanggaran->poin }} Poin</span>
                        @if($p->status === 'diterima')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-100 text-emerald-700 border border-emerald-200">
                                <i class="fas fa-check-circle text-xs"></i>
                                Diterima
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-100 text-rose-700 border border-rose-200">
                                <i class="fas fa-times-circle text-xs"></i>
                                Ditolak
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <i class="fas fa-clipboard-check text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">Tidak ada data pelanggaran</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Prestasi Section -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-4">
            <h3 class="text-xl font-bold text-white flex items-center gap-2">
                <i class="fas fa-trophy"></i>
                Riwayat Prestasi
            </h3>
        </div>
        <div class="p-6">
            @forelse ($siswa->prestasi as $p)
                <div class="flex items-center justify-between p-4 bg-emerald-50 rounded-lg border border-emerald-100 mb-3 hover:bg-emerald-100 transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-emerald-600"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $p->jenis->nama }}</p>
                            <p class="text-xs text-gray-500">{{ $p->tanggal->format('d M Y') ?? 'Tanggal tidak tersedia' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-emerald-600 font-bold">+{{ $p->jenis->poin }} Poin</span>
                        @if($p->status === 'diterima')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-100 text-emerald-700 border border-emerald-200">
                                <i class="fas fa-check-circle text-xs"></i>
                                Diterima
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-100 text-rose-700 border border-rose-200">
                                <i class="fas fa-times-circle text-xs"></i>
                                Ditolak
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <i class="fas fa-medal text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">Tidak ada data prestasi</p>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection