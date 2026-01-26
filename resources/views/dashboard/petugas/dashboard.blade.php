@extends('dashboard.petugas.main')

@section('content')

<!-- Header Card -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-2">
                Dashboard Petugas
            </h1>
            <p class="text-gray-500 flex items-center gap-2">
                <i class="fas fa-calendar-alt text-sm text-primary"></i>
                <span>{{ now()->isoFormat('dddd, D MMMM YYYY') }}</span>
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
        <p class="text-sm text-gray-500 font-medium">Total Siswa Terdaftar</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">Data keseluruhan siswa</p>
        </div>
    </div>

    <!-- Pelanggaran Hari Ini -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-exclamation-circle text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-primary mb-2">{{ $pelanggaranHariIni }}</h3>
        <p class="text-sm text-gray-500 font-medium">Pelanggaran Hari Ini</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">
                <i class="fas fa-clock mr-1"></i>
                Update: <span class="clock"></span> WIB
            </p>
        </div>
    </div>

    <!-- Prestasi Hari Ini -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-trophy text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-primary mb-2">{{ $prestasiHariIni }}</h3>
        <p class="text-sm text-gray-500 font-medium">Prestasi Hari Ini</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">
                <i class="fas fa-clock mr-1"></i>
                Update: <span class="clock"></span> WIB
            </p>
        </div>
    </div>

    <!-- Total Input Saya -->
    <div class="bg-gradient-to-br from-primary to-purple-600 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white/20 p-3 rounded-xl">
                <i class="fas fa-clipboard-check text-white text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-white mb-2">{{ $totalInputSaya }}</h3>
        <p class="text-sm text-white/90 font-medium">Total Input Saya</p>
        <div class="mt-4 pt-4 border-t border-white/20">
            <p class="text-xs text-white/70">Kontribusi Anda</p>
        </div>
    </div>

</div>

<!-- Quick Action Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Input Pelanggaran -->
    <a href="{{ route('inputpelanggaran.create') }}" 
       class="group relative overflow-hidden bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/10 to-purple-600/10 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="flex items-start justify-between mb-4">
                <div class="bg-gradient-to-br from-primary to-purple-600 p-4 rounded-xl shadow-lg">
                    <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                </div>
                <span class="bg-purple-50 text-primary text-xs font-semibold px-3 py-1.5 rounded-full border border-primary/20">Input Data</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Pelanggaran Siswa</h3>
            <p class="text-gray-500 text-sm mb-4">Catat pelanggaran dengan bukti pendukung</p>
            <div class="flex items-center text-primary font-semibold text-sm group-hover:gap-3 gap-2 transition-all">
                <span>Input Sekarang</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>

    <!-- Input Prestasi -->
    <a href="{{ route('inputprestasi.create') }}" 
       class="group relative overflow-hidden bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100">
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/10 to-purple-600/10 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="flex items-start justify-between mb-4">
                <div class="bg-gradient-to-br from-primary to-purple-600 p-4 rounded-xl shadow-lg">
                    <i class="fas fa-star text-white text-2xl"></i>
                </div>
                <span class="bg-purple-50 text-primary text-xs font-semibold px-3 py-1.5 rounded-full border border-primary/20">Input Data</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Prestasi Siswa</h3>
            <p class="text-gray-500 text-sm mb-4">Catat prestasi dengan bukti pendukung</p>
            <div class="flex items-center text-primary font-semibold text-sm group-hover:gap-3 gap-2 transition-all">
                <span>Input Sekarang</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>
</div>



<!-- Data Tables Section -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
    
    <!-- Pelanggaran Terbaru -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Pelanggaran Terbaru</h2>
                    <p class="text-xs text-gray-500">5 Data terbaru yang dicatat</p>
                </div>
            </div>
            <a href="{{ route('inputpelanggaran.index') }}" 
               class="text-xs font-semibold text-primary hover:text-purple-600 flex items-center gap-1.5 bg-primary/5 hover:bg-primary/10 px-4 py-2 rounded-lg transition-colors">
                <span>Lihat Semua</span>
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
        
        <div class="p-6">
            @if($pelanggaranTerbaru->count() > 0)
            <div class="space-y-3">
                @foreach ($pelanggaranTerbaru as $item)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? '-' }}</p>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fas fa-school text-primary"></i>
                            <span>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary mb-0.5">-{{ $item->jenispelanggaran->poin ?? 0 }} Poin</p>
                        <p class="text-xs text-gray-400">
                            <i class="fas fa-clock mr-1"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="inline-block bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                    <i class="fas fa-inbox text-primary text-4xl"></i>
                </div>
                <p class="text-gray-500 font-medium">Belum ada data pelanggaran</p>
                <p class="text-xs text-gray-400 mt-1">Data akan muncul setelah input pertama</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Prestasi Terbaru -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-star text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Prestasi Terbaru</h2>
                    <p class="text-xs text-gray-500">5 Data terbaru yang dicatat</p>
                </div>
            </div>
            <a href="{{ route('inputprestasi.index') }}" 
               class="text-xs font-semibold text-primary hover:text-purple-600 flex items-center gap-1.5 bg-primary/5 hover:bg-primary/10 px-4 py-2 rounded-lg transition-colors">
                <span>Lihat Semua</span>
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
        
        <div class="p-6">
            @if(isset($prestasiTerbaru) && $prestasiTerbaru->count() > 0)
            <div class="space-y-3">
                @foreach ($prestasiTerbaru as $item)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? '-' }}</p>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fas fa-school text-primary"></i>
                            <span>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary mb-0.5">+{{ $item->jenis->poin ?? 0 }} Poin</p>
                        <p class="text-xs text-gray-400">
                            <i class="fas fa-clock mr-1"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="inline-block bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                    <i class="fas fa-inbox text-primary text-4xl"></i>
                </div>
                <p class="text-gray-500 font-medium">Belum ada data prestasi</p>
                <p class="text-xs text-gray-400 mt-1">Data akan muncul setelah input pertama</p>
            </div>
            @endif
        </div>
    </div>

</div>



<script>
    function updateClock() {
        const now = new Date();

        const time = now.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            timeZone: 'Asia/Jakarta'
        });

        document.querySelectorAll('.clock').forEach(el => {
            el.innerText = time;
        });
    }

    updateClock();              // panggil langsung
    setInterval(updateClock, 1000); // update tiap detik
</script>



@endsection