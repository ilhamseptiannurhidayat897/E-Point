@extends('dashboard.siswa.main')

@section('content')

<!-- Header Card -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-2">
                Dashboard Siswa
            </h1>
            <p class="text-gray-500 flex items-center gap-2">
                <i class="fas fa-calendar-alt text-sm text-primary"></i>
                <span>{{ now()->isoFormat('dddd, D MMMM YYYY') }}</span>
            </p>
        </div>
        <div class="bg-gradient-to-r from-primary/10 to-purple-600/10 px-6 py-4 rounded-xl border border-primary/20">
            <p class="text-xs text-gray-500 mb-1">Selamat datang,</p>
            <p class="font-bold text-primary text-lg">{{ auth()->user()->siswa->nama ?? 'Siswa' }}</p>
            <p class="text-xs text-gray-500 mt-1">
                NIS: {{ auth()->user()->siswa->nis ?? '-' }} | {{ auth()->user()->siswa->kelas->nama_kelas ?? '-' }}
            </p>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    
    <!-- Total Prestasi -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-green-500/10 to-green-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-trophy text-green-500 text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-green-500 mb-2">+{{ number_format($totalPrestasi ?? 0) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Prestasi</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400 flex items-center">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                Poin Kebaikan
            </p>
        </div>
    </div>

    <!-- Total Pelanggaran -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-red-500/10 to-red-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-red-500 mb-2">-{{ number_format($totalPelanggaran ?? 0) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Pelanggaran</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400 flex items-center">
                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                Poin Pelanggaran
            </p>
        </div>
    </div>

    <!-- Total Poin Akumulasi -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-purple-500/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-chart-line text-purple-600 text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-purple-600 mb-2">{{ $totalPoin ?? 0 }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Poin Akumulasi</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400 flex items-center">
                <span class="w-2 h-2 bg-purple-600 rounded-full mr-2"></span>
                Sisa Poin Saat Ini
            </p>
        </div>
    </div>

</div>

<!-- Status Poin & Akses Cepat -->
<!-- Status Poin & Akses Cepat -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
    
    <!-- Status Poin -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <!-- Header -->
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center">
                <i class="fas fa-chart-line text-indigo-500 text-lg"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Status Poin</h2>
                <p class="text-sm text-gray-500">Evaluasi akumulasi poin Anda</p>
            </div>
        </div>
    
        <!-- Current Score Display -->
        <div class="text-center mb-6">
            <p class="text-sm text-gray-500 mb-2">Total Poin Saat Ini</p>
            <p class="text-4xl font-bold 
                @if(($totalPoin ?? 0) >= 0) text-emerald-600
                @else text-rose-600
                @endif">
                {{ $totalPoin > 0 ? '+' : '' }}{{ $totalPoin ?? 0 }}
            </p>
        </div>
    
        <!-- Visual Progress Bar -->
        <div class="mb-6">
            <div class="relative h-3 bg-gray-200 rounded-full overflow-hidden">
                <div class="absolute top-0 h-3 bg-gradient-to-r from-rose-300 via-gray-300 to-emerald-300 rounded-full transition-all duration-500" 
                     style="width: 100%;">
                </div>
                <!-- Current Position Indicator -->
                <div class="absolute top-1/2 -translate-y-1/2 w-5 h-5 bg-white border-2 
                    @if(($totalPoin ?? 0) >= 0) border-emerald-500
                    @else border-rose-500
                    @endif
                    rounded-full shadow-md transition-all duration-500 z-10"
                     style="left: {{ min(max((($totalPoin ?? 0) + 100) / 2, 0), 100) }}%; margin-left: -10px;">
                </div>
            </div>
            <div class="flex justify-between text-xs text-gray-400 mt-2">
                <span>-100</span>
                <span>0</span>
                <span>+100</span>
            </div>
        </div>
    
        <!-- Point Breakdown -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="text-center p-4 bg-emerald-50 rounded-xl border border-emerald-100">
                <i class="fas fa-arrow-up text-emerald-500 mb-2"></i>
                <p class="text-xs text-emerald-600 font-medium">Poin Prestasi</p>
                <p class="text-xl font-bold text-emerald-700">+{{ $totalPrestasi ?? 0 }}</p>
            </div>
            <div class="text-center p-4 bg-rose-50 rounded-xl border border-rose-100">
                <i class="fas fa-arrow-down text-rose-500 mb-2"></i>
                <p class="text-xs text-rose-600 font-medium">Poin Pelanggaran</p>
                <p class="text-xl font-bold text-rose-700">-{{ $totalPelanggaran ?? 0 }}</p>
            </div>
        </div>
    
        <!-- Status Verdict -->
        <div class="text-center p-4 rounded-xl border
            @if(($totalPoin ?? 0) >= 0) border-emerald-200 bg-emerald-50/50
            @elseif(($totalPoin ?? 0) < -20 && ($totalPoin ?? 0) >= -50) border-amber-200 bg-amber-50/50
            @else border-rose-200 bg-rose-50/50
            @endif">
            
            @if(($totalPoin ?? 0) >= 0)
                <i class="fas fa-check-circle text-2xl text-emerald-500 mb-2"></i>
                <p class="font-semibold text-gray-800">Status Baik</p>
                <p class="text-sm text-gray-600 mt-1">Poin Anda dalam kondisi positif.</p>
            @elseif(($totalPoin ?? 0) < -20 && ($totalPoin ?? 0) >= -50)
                <i class="fas fa-exclamation-circle text-2xl text-amber-500 mb-2"></i>
                <p class="font-semibold text-gray-800">Perlu Perhatian</p>
                <p class="text-sm text-gray-600 mt-1">Disarankan untuk meningkatkan prestasi.</p>
            @else
                <i class="fas fa-times-circle text-2xl text-rose-500 mb-2"></i>
                <p class="font-semibold text-gray-800">Perlu Bimbingan</p>
                <p class="text-sm text-gray-600 mt-1">Segera koordinasi dengan wali kelas atau BK.</p>
            @endif
        </div>
    </div>

    <!-- Akses Cepat -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary/10 to-purple-600/10 flex items-center justify-center">
                    <i class="fas fa-bolt text-primary text-lg"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Akses Cepat</h2>
                    <p class="text-xs text-gray-500">Menu utama siswa</p>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('siswa.pelanggaran') }}" 
                   class="group relative overflow-hidden bg-gray-50 hover:bg-red-50 p-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 border-2 border-transparent hover:border-red-200 text-center">
                    <div class="w-14 h-14 mx-auto bg-gradient-to-br from-red-100 to-red-200 group-hover:from-red-500 group-hover:to-red-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all shadow-md">
                        <i class="fas fa-exclamation-triangle text-red-600 group-hover:text-white text-xl transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-1">Pelanggaran</h3>
                    <p class="text-xs text-gray-500">Lihat riwayat</p>
                </a>
                
                <a href="{{ route('siswa.prestasi') }}" 
                   class="group relative overflow-hidden bg-gray-50 hover:bg-green-50 p-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 border-2 border-transparent hover:border-green-200 text-center">
                    <div class="w-14 h-14 mx-auto bg-gradient-to-br from-green-100 to-green-200 group-hover:from-green-500 group-hover:to-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all shadow-md">
                        <i class="fas fa-trophy text-green-600 group-hover:text-white text-xl transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-1">Prestasi</h3>
                    <p class="text-xs text-gray-500">Lihat pencapaian</p>
                </a>
                
                <a href="{{ route('siswa.profil') }}" 
                   class="group relative overflow-hidden bg-gray-50 hover:bg-blue-50 p-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 border-2 border-transparent hover:border-blue-200 text-center">
                    <div class="w-14 h-14 mx-auto bg-gradient-to-br from-blue-100 to-blue-200 group-hover:from-blue-500 group-hover:to-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all shadow-md">
                        <i class="fas fa-user text-blue-600 group-hover:text-white text-xl transition-colors"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-1">Profil</h3>
                    <p class="text-xs text-gray-500">Edit data diri</p>
                </a>
            </div>
        </div>
    </div>

</div>

<!-- Riwayat Terbaru -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                <i class="fas fa-history text-primary"></i>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Riwayat Terbaru</h2>
                <p class="text-xs text-gray-500">Aktivitas terbaru Anda</p>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        @if(!empty($riwayatTerbaru) && count($riwayatTerbaru) > 0)
        <div class="space-y-3">
            @foreach($riwayatTerbaru ?? [] as $riwayat)
            <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform
                    {{ $riwayat['type'] == 'prestasi' ? 'bg-gradient-to-br from-green-500 to-green-600' : 'bg-gradient-to-br from-red-500 to-red-600' }}">
                    @if($riwayat['type'] == 'prestasi')
                        <i class="fas fa-trophy text-white"></i>
                    @else
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-bold text-gray-800 truncate mb-0.5">{{ $riwayat['title'] }}</p>
                    <p class="text-sm text-gray-500 truncate">{{ $riwayat['description'] }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold mb-0.5 {{ $riwayat['type'] == 'prestasi' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $riwayat['points'] }}
                    </p>
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-clock mr-1"></i>
                        {{ $riwayat['date'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="inline-block bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                <i class="fas fa-history text-primary text-4xl"></i>
            </div>
            <p class="text-gray-500 font-medium">Belum ada riwayat aktivitas</p>
            <p class="text-xs text-gray-400 mt-1">Riwayat akan muncul setelah ada pencatatan</p>
        </div>
        @endif
    </div>
</div>

<style>
/* Animasi untuk elemen yang muncul */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Terapkan animasi ke elemen-elemen tertentu */
.grid > div {
    animation: fadeInUp 0.5s ease-out forwards;
    opacity: 0;
}

/* Delay animasi untuk setiap elemen */
.grid > div:nth-child(1) { animation-delay: 0.1s; }
.grid > div:nth-child(2) { animation-delay: 0.2s; }
.grid > div:nth-child(3) { animation-delay: 0.3s; }
.grid > div:nth-child(4) { animation-delay: 0.4s; }
</style>

@push('scripts')
<script>
    // Update current time and date
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit',
            hour12: false 
        });
        const dateString = now.toLocaleDateString('id-ID', { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        
        document.getElementById('current-time').textContent = timeString;
        document.getElementById('current-date').textContent = dateString;
    }
    
    updateTime();
    setInterval(updateTime, 60000);
</script>
@endpush

@endsection