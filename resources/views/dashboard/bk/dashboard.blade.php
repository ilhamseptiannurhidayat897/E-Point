@extends('dashboard.bk.main')

@section('content')

<!-- Header Card -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-2">
                Dashboard Bimbingan Konseling
            </h1>
            <div>
                <p class="text-lg font-semibold text-gray-500 mb-1">Selamat datang,</p>
            </div>
        </div>
        <div class="text-right">
            <p class="text-gray-500 flex items-center gap-2 justify-end mb-2">
                <i class="fas fa-calendar-alt text-sm text-primary"></i>
                <span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </p>
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
            <p class="text-xs text-gray-400">Seluruh data siswa terdaftar</p>
        </div>
    </div>

    <!-- Total Pelanggaran -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-exclamation-triangle text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-red-600 mb-2">{{ number_format($totalPelanggaran) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Pelanggaran</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">Data terverifikasi</p>
        </div>
    </div>

    <!-- Total Prestasi -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-trophy text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-green-600 mb-2">{{ number_format($totalPrestasi) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Prestasi</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">Data terverifikasi</p>
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

</div>

<!-- Data Verifikasi Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    
    <!-- Pelanggaran Pending Verifikasi -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-exclamation-circle text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Pelanggaran Pending</h2>
                    <p class="text-xs text-gray-500">Perlu verifikasi BK</p>
                </div>
            </div>
            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">
                {{ isset($pelanggaranPending) ? $pelanggaranPending->count() : 0 }} Data
            </span>
        </div>
        
        <div class="p-6">
            @if(isset($pelanggaranPending) && $pelanggaranPending->count() > 0)
            <div class="space-y-3 max-h-96 overflow-y-auto">
                @foreach($pelanggaranPending as $item)
                <div class="flex items-center gap-4 p-4 bg-red-50/30 hover:bg-red-50 rounded-xl transition-all duration-200 group border border-red-100">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        {{ substr($item->siswa->nama ?? '-', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? '-' }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $item->jenispelanggaran->nama ?? '-' }}</p>
                        <p class="text-xs text-gray-400 mt-1">
                            <i class="fas fa-clock mr-1"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-red-600 mb-0.5">-{{ $item->jenispelanggaran->poin ?? 0 }} Poin</p>
                        <a href="{{ route('pelanggaran.index') }}" class="inline-flex items-center gap-1 text-xs text-primary hover:text-primary/80 transition-colors">
                            <span>Verifikasi</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
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

    <!-- Prestasi Pending Verifikasi -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-star text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Prestasi Pending</h2>
                    <p class="text-xs text-gray-500">Perlu verifikasi BK</p>
                </div>
            </div>
            <span class="bg-amber-100 text-amber-600 px-3 py-1 rounded-full text-xs font-semibold">
                {{ isset($prestasiPending) ? $prestasiPending->count() : 0 }} Data
            </span>
        </div>
        
        <div class="p-6">
            @if(isset($prestasiPending) && $prestasiPending->count() > 0)
            <div class="space-y-3 max-h-96 overflow-y-auto">
                @foreach($prestasiPending as $item)
                <div class="flex items-center gap-4 p-4 bg-green-50/30 hover:bg-green-50 rounded-xl transition-all duration-200 group border border-green-100">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        {{ substr($item->siswa->nama ?? '-', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? '-' }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $item->jenis->nama ?? '-' }}</p>
                        <p class="text-xs text-gray-400 mt-1">
                            <i class="fas fa-clock mr-1"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-green-600 mb-0.5">+{{ $item->jenis->poin ?? 0 }} Poin</p>
                        <a href="{{ route('prestasi.index') }}" class="inline-flex items-center gap-1 text-xs text-primary hover:text-primary/80 transition-colors">
                            <span>Verifikasi</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="inline-block bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                    <i class="fas fa-check-circle text-primary text-5xl"></i>
                </div>
                <p class="text-gray-500 font-medium mb-2">Semua data telah terverifikasi</p>
                <p class="text-xs text-gray-400">Tidak ada prestasi yang menunggu verifikasi</p>
            </div>
            @endif
        </div>
    </div>

</div>

<!-- Riwayat Data Terverifikasi -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    
    <!-- Pelanggaran Terverifikasi -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-check-circle text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Pelanggaran Terverifikasi</h2>
                    <p class="text-xs text-gray-500">Riwayat data yang sudah disetujui</p>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            @if(isset($pelanggaranTerbaru) && $pelanggaranTerbaru->count() > 0)
            <div class="space-y-3 max-h-80 overflow-y-auto">
                @foreach($pelanggaranTerbaru->take(5) as $item)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white shadow group-hover:scale-105 transition-transform">
                        {{ substr($item->siswa->nama ?? '-', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 truncate text-sm">{{ $item->siswa->nama ?? '-' }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $item->jenispelanggaran->nama ?? '-' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-bold text-red-600">-{{ $item->jenispelanggaran->poin ?? 0 }}</p>
                        <p class="text-xs text-gray-400">{{ $item->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-3xl text-gray-300 mb-2"></i>
                <p class="text-sm text-gray-400">Belum ada data terverifikasi</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Prestasi Terverifikasi -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-trophy text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Prestasi Terverifikasi</h2>
                    <p class="text-xs text-gray-500">Riwayat data yang sudah disetujui</p>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            @if(isset($prestasiTerbaru) && $prestasiTerbaru->count() > 0)
            <div class="space-y-3 max-h-80 overflow-y-auto">
                @foreach($prestasiTerbaru->take(5) as $item)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-lg flex items-center justify-center text-white shadow group-hover:scale-105 transition-transform">
                        {{ substr($item->siswa->nama ?? '-', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 truncate text-sm">{{ $item->siswa->nama ?? '-' }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $item->jenis->nama ?? '-' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-bold text-green-600">+{{ $item->jenis->poin ?? 0 }}</p>
                        <p class="text-xs text-gray-400">{{ $item->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-3xl text-gray-300 mb-2"></i>
                <p class="text-sm text-gray-400">Belum ada data terverifikasi</p>
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
        const dateElement = document.getElementById('current-date');
        if (dateElement) {
            dateElement.textContent = dateString;
        }
    }
    
    updateDate();
</script>

@endsection