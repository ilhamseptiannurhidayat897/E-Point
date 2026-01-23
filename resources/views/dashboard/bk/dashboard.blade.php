@extends('dashboard.bk.main')

@section('content')

<!-- Header Card -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-2">
                Dashboard Bimbingan Konseling
            </h1>
            <p class="text-gray-500 flex items-center gap-2">
                <i class="fas fa-calendar-alt text-sm text-primary"></i>
                <span id="current-date"></span>
            </p>
        </div>
        <div class="bg-gradient-to-r from-primary/10 to-purple-600/10 px-6 py-4 rounded-xl border border-primary/20">
            <p class="text-xs text-gray-500 mb-1">Selamat datang kembali,</p>
            <p class="font-bold text-primary text-lg">{{ Auth::user()->name }}</p>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Total Siswa -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-users text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-gray-800 mb-2">{{ number_format($totalSiswa) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Siswa</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">Data keseluruhan siswa</p>
        </div>
    </div>

    <!-- Total Pelanggaran -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-exclamation-triangle text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-primary mb-2">{{ number_format($totalPelanggaran) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Pelanggaran</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">Semua data pelanggaran</p>
        </div>
    </div>

    <!-- Pending Verifikasi -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-clock text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-amber-600 mb-2">{{ number_format($pending) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Menunggu Verifikasi</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">Perlu ditinjau segera</p>
        </div>
    </div>

    <!-- Terverifikasi -->
    <div class="bg-gradient-to-br from-primary to-purple-600 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white/20 p-3 rounded-xl">
                <i class="fas fa-check-circle text-white text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-white mb-2">{{ number_format($verifikasi) }}</h3>
        <p class="text-sm text-white/90 font-medium">Terverifikasi</p>
        <div class="mt-4 pt-4 border-t border-white/20">
            <p class="text-xs text-white/70">Data telah diverifikasi</p>
        </div>
    </div>

</div>

<!-- Quick Access & Data Tables -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
    
    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                <i class="fas fa-bolt text-primary"></i>
            </div>
            <h2 class="text-lg font-bold text-gray-800">Akses Cepat</h2>
        </div>
        
        <div class="space-y-3">
            <a href="{{ route('pelanggaran.index') }}" 
               class="flex items-center gap-3 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 hover:from-primary/10 hover:to-purple-600/10 rounded-xl transition-all group border border-primary/10">
                <div class="bg-gradient-to-br from-primary to-purple-600 p-2.5 rounded-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-list text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-gray-800">Data Pelanggaran</p>
                    <p class="text-xs text-gray-500">Lihat semua pelanggaran</p>
                </div>
                <i class="fas fa-arrow-right text-primary group-hover:translate-x-1 transition-transform"></i>
            </a>

            <a href="{{ route('prestasi.index') }}" 
               class="flex items-center gap-3 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 hover:from-primary/10 hover:to-purple-600/10 rounded-xl transition-all group border border-primary/10">
                <div class="bg-gradient-to-br from-primary to-purple-600 p-2.5 rounded-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-star text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-gray-800">Data Prestasi</p>
                    <p class="text-xs text-gray-500">Lihat semua prestasi</p>
                </div>
                <i class="fas fa-arrow-right text-primary group-hover:translate-x-1 transition-transform"></i>
            </a>

            <a href="{{ route('datasiswa.index') }}" 
               class="flex items-center gap-3 p-4 bg-gradient-to-r from-primary/5 to-purple-600/5 hover:from-primary/10 hover:to-purple-600/10 rounded-xl transition-all group border border-primary/10">
                <div class="bg-gradient-to-br from-primary to-purple-600 p-2.5 rounded-lg group-hover:scale-110 transition-transform">
                    <i class="fas fa-user-graduate text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-gray-800">Data Siswa</p>
                    <p class="text-xs text-gray-500">Lihat profil siswa</p>
                </div>
                <i class="fas fa-arrow-right text-primary group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>

    <!-- Pelanggaran Pending -->
    <div class="xl:col-span-2 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-clock text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Menunggu Verifikasi</h2>
                    <p class="text-xs text-gray-500">Pelanggaran yang perlu ditinjau</p>
                </div>
            </div>
            <span class="bg-amber-100 text-amber-600 px-3 py-1 rounded-full text-xs font-semibold">
                {{ $pending }} Data
            </span>
        </div>
        
        <div class="p-6">
            @if(isset($pelanggaranPending) && $pelanggaranPending->count() > 0)
            <div class="space-y-3">
                @foreach($pelanggaranPending->take(5) as $item)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        {{ substr($item->siswa->nama ?? '-', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? '-' }}</p>
                        <p class="text-xs text-gray-500">{{ $item->jenispelanggaran->nama ?? '-' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary mb-0.5">-{{ $item->jenispelanggaran->poin ?? 0 }} Poin</p>
                        <p class="text-xs text-gray-400">
                            <i class="fas fa-clock mr-1"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <a href="{{ route('pelanggaran.index') }}" class="p-2 hover:bg-primary/10 text-primary rounded-lg transition-colors">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="inline-block bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                    <i class="fas fa-check-circle text-primary text-5xl"></i>
                </div>
                <p class="text-gray-500 font-medium mb-2">Semua data telah terverifikasi</p>
                <p class="text-xs text-gray-400">Tidak ada pelanggaran yang menunggu verifikasi</p>
            </div>
            @endif
        </div>
    </div>

</div>

<script>
    // Update current date
    function updateDate() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        const dateString = now.toLocaleDateString('id-ID', options);
        document.getElementById('current-date').textContent = dateString;
    }
    
    updateDate();
</script>

@endsection