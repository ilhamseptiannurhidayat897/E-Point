@extends('dashboard.wali_kelas.main')

@section('content')
<!-- Header Card -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-2">
                Dashboard Wali Kelas
            </h1>
            <p class="text-gray-500 flex items-center gap-2">
                <i class="fas fa-calendar-alt text-sm text-primary"></i>
                <span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </p>
        </div>
        <div class="bg-gradient-to-r from-primary/10 to-purple-600/10 px-6 py-4 rounded-xl border border-primary/20">
            <p class="text-xs text-gray-500 mb-1">Kelas:</p>
            <p class="font-bold text-primary text-lg">{{ $kelasName ?? 'Kelas' }}</p>
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
        <h3 class="text-4xl font-bold text-gray-800 mb-2">{{ number_format($totalSiswa ?? 0) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Siswa</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">Siswa di Kelas</p>
        </div>
    </div>

    <!-- Pelanggaran -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-exclamation-circle text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-primary mb-2">{{ number_format($totalPelanggaran ?? 0) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Pelanggaran</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">{{ $pelanggaranBulanIni ?? 0 }} bulan ini</p>
        </div>
    </div>

    <!-- Prestasi -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-trophy text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-primary mb-2">{{ number_format($totalPrestasi ?? 0) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Prestasi</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400">{{ $prestasiBulanIni ?? 0 }} bulan ini</p>
        </div>
    </div>

    <!-- Total Poin -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-clipboard-check text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-green-500 mb-2">{{ number_format($totalPoin ?? 0) }}</h3>
        <p class="text-sm text-gray-600 font-medium">Total Poin</p>
        <div class="mt-4 pt-4 border-t border-gray-200">
            <p class="text-xs text-gray-500">Akumulasi Kelas</p>
        </div>
    </div>


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
                    <h2 class="text-lg font-bold text-gray-800">Pelanggaran Terbaru Kelas</h2>
                    <p class="text-xs text-gray-500">Data terbaru yang dicatat</p>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            @if(isset($pelanggaranTerbaru) && count($pelanggaranTerbaru) > 0)
            <div class="space-y-3">
                @foreach ($pelanggaranTerbaru as $item)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? 'N/A' }}</p>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <span>{{ $item->jenisPelanggaran->nama ?? 'Tidak diketahui' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-red-600 mb-0.5">-{{ $item->jenisPelanggaran->poin ?? 0 }} Poin</p>
                        <p class="text-xs text-gray-400">
                            <i class="fas fa-clock mr-1"></i>
                            {{ $item->created_at->format('d/m') }}
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
                    <h2 class="text-lg font-bold text-gray-800">Prestasi Terbaru Kelas</h2>
                    <p class="text-xs text-gray-500">Data terbaru yang dicatat</p>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            @if(isset($prestasiTerbaru) && count($prestasiTerbaru) > 0)
            <div class="space-y-3">
                @foreach ($prestasiTerbaru as $item)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? 'N/A' }}</p>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <span>{{ $item->jenis->nama ?? 'Tidak diketahui' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-green-600 mb-0.5">+{{ $item->jenis->poin ?? 0 }} Poin</p>
                        <p class="text-xs text-gray-400">
                            <i class="fas fa-clock mr-1"></i>
                            {{ $item->created_at->format('d/m') }}
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

<!-- Top Siswa -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
    
    <!-- Top Pelanggaran -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Siswa dengan Pelanggaran Terbanyak</h2>
                    <p class="text-xs text-gray-500">Peringkat siswa berdasarkan pelanggaran</p>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            @if(isset($topPelanggaran) && count($topPelanggaran) > 0)
            <div class="space-y-3">
                @foreach ($topPelanggaran as $index => $siswa)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-medium text-sm mr-3 
                        {{ $index == 0 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 
                           ($index == 1 ? 'bg-gradient-to-r from-gray-300 to-gray-500' : 
                           ($index == 2 ? 'bg-gradient-to-r from-orange-400 to-orange-600' : 'bg-red-500')) }}">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-gray-900">{{ $siswa->nama }}</div>
                        <div class="text-sm text-gray-500">{{ $siswa->nis ?? '-' }}</div>
                    </div>
                    <div class="bg-red-50 text-red-600 font-medium px-3 py-1 rounded-full text-sm">
                        {{ $siswa->pelanggaran_count }} kali
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="inline-block bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                    <i class="fas fa-inbox text-primary text-4xl"></i>
                </div>
                <p class="text-gray-500 font-medium">Tidak ada data</p>
                <p class="text-xs text-gray-400 mt-1">Data akan muncul setelah input pertama</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Top Prestasi -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-star text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Siswa dengan Prestasi Terbanyak</h2>
                    <p class="text-xs text-gray-500">Peringkat siswa berdasarkan prestasi</p>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            @if(isset($topPrestasi) && count($topPrestasi) > 0)
            <div class="space-y-3">
                @foreach ($topPrestasi as $index => $siswa)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-medium text-sm mr-3 
                        {{ $index == 0 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 
                           ($index == 1 ? 'bg-gradient-to-r from-gray-300 to-gray-500' : 
                           ($index == 2 ? 'bg-gradient-to-r from-orange-400 to-orange-600' : 'bg-green-500')) }}">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-gray-900">{{ $siswa->nama }}</div>
                        <div class="text-sm text-gray-500">{{ $siswa->nis ?? '-' }}</div>
                    </div>
                    <div class="bg-green-50 text-green-600 font-medium px-3 py-1 rounded-full text-sm">
                        {{ $siswa->prestasi_count }} kali
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="inline-block bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                    <i class="fas fa-inbox text-primary text-4xl"></i>
                </div>
                <p class="text-gray-500 font-medium">Tidak ada data pepenggg</p>
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