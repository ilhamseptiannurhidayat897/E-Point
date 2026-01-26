@extends('dashboard.admin.main')

@section('content')

<!-- Header Card -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent mb-2">
                Dashboard Admin
            </h1>
            <p class="text-gray-500 flex items-center gap-2">
                <i class="fas fa-calendar-alt text-sm text-primary"></i>
                <span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </p>
        </div>
        <div class="bg-gradient-to-r from-primary/10 to-purple-600/10 px-6 py-4 rounded-xl border border-primary/20">
            <p class="text-xs text-gray-500 mb-1">Sistem Informasi</p>
            <p class="font-bold text-primary text-lg">E-Point SMKN 1 Kawali</p>
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
            <p class="text-xs text-gray-400 flex items-center">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                Siswa Aktif
            </p>
        </div>
    </div>

    <!-- Total Kelas -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-school text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-gray-800 mb-2">{{ number_format($totalKelas) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Kelas</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400 flex items-center">
                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                Kelas Aktif
            </p>
        </div>
    </div>

    <!-- Total Pelanggaran -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-3 rounded-xl group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-exclamation-triangle text-primary text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-gray-800 mb-2">{{ number_format($totalPelanggaran) }}</h3>
        <p class="text-sm text-gray-500 font-medium">Total Pelanggaran</p>
        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400 flex items-center">
                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                {{ $pelanggaranBulanIni }} bulan ini
            </p>
        </div>
    </div>

    <!-- Total Prestasi -->
    <div class="bg-gradient-to-br from-primary to-purple-600 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white/20 p-3 rounded-xl">
                <i class="fas fa-trophy text-white text-xl"></i>
            </div>
        </div>
        <h3 class="text-4xl font-bold text-white mb-2">{{ number_format($totalPrestasi) }}</h3>
        <p class="text-sm text-white/90 font-medium">Total Prestasi</p>
        <div class="mt-4 pt-4 border-t border-white/20">
            <p class="text-xs text-white/70">{{ $prestasiBulanIni }} bulan ini</p>
        </div>
    </div>

</div>

<!-- Chart & Pengguna Sistem -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
    
    <!-- Chart Tren Bulanan -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-chart-line text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Tren Bulanan</h2>
                    <p class="text-xs text-gray-500">6 Bulan Terakhir</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="h-64 relative chart-container">
                <canvas id="trenChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Pengguna Sistem -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-users-cog text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Pengguna Sistem</h2>
                    <p class="text-xs text-gray-500">Total pengguna berdasarkan peran</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-3">
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 mb-0.5">Admin</p>
                        <p class="text-xs text-gray-500">Administrator Sistem</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary">1</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 mb-0.5">Bimbingan Konseling</p>
                        <p class="text-xs text-gray-500">Verifikasi & Monitoring</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary">{{ $totalBK }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 mb-0.5">Wali Kelas</p>
                        <p class="text-xs text-gray-500">Monitoring Kelas</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary">{{ $totalWaliKelas }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 mb-0.5">Petugas</p>
                        <p class="text-xs text-gray-500">Pencatatan Data</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary">{{ $totalPetugas }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Data Terbaru -->
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
                    <p class="text-xs text-gray-500">5 Data terbaru</p>
                </div>
            </div>
            <a href="{{ route('pelanggaran.index') }}" 
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
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? 'N/A' }}</p>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fas fa-school text-primary"></i>
                            <span>{{ $item->siswa->kelas->nama_kelas ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary mb-0.5">-{{ $item->jenisPelanggaran->poin ?? 0 }} Poin</p>
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
                    <i class="fas fa-trophy text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Prestasi Terbaru</h2>
                    <p class="text-xs text-gray-500">5 Data terbaru</p>
                </div>
            </div>
            <a href="{{ route('prestasi.index') }}" 
               class="text-xs font-semibold text-primary hover:text-purple-600 flex items-center gap-1.5 bg-primary/5 hover:bg-primary/10 px-4 py-2 rounded-lg transition-colors">
                <span>Lihat Semua</span>
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
        
        <div class="p-6">
            @if($prestasiTerbaru->count() > 0)
            <div class="space-y-3">
                @foreach ($prestasiTerbaru as $item)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $item->siswa->nama ?? 'N/A' }}</p>
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

<!-- Top Siswa -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
    
    <!-- Top Pelanggaran -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-exclamation-triangle text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Siswa dengan Pelanggaran Terbanyak</h2>
                    <p class="text-xs text-gray-500">Top 5 siswa</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            @if($topPelanggaran->count() > 0)
            <div class="space-y-3">
                @foreach ($topPelanggaran as $index => $siswa)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center text-white font-bold shadow-lg group-hover:scale-105 transition-transform
                        {{ $index == 0 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 
                           ($index == 1 ? 'bg-gradient-to-r from-gray-300 to-gray-500' : 
                           ($index == 2 ? 'bg-gradient-to-r from-orange-400 to-orange-600' : 'bg-gradient-to-br from-primary to-purple-600')) }}">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $siswa->nama }}</p>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fas fa-school text-primary"></i>
                            <span>{{ $siswa->kelas->nama_kelas ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary">{{ $siswa->pelanggaran_count }} kasus</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="inline-block bg-gradient-to-br from-primary/10 to-purple-600/10 p-6 rounded-2xl mb-4">
                    <i class="fas fa-smile text-primary text-4xl"></i>
                </div>
                <p class="text-gray-500 font-medium">Tidak ada data pelanggaran</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Top Prestasi -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 px-6 py-5 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary/10 to-purple-600/10 p-2.5 rounded-lg">
                    <i class="fas fa-trophy text-primary"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Siswa dengan Prestasi Terbanyak</h2>
                    <p class="text-xs text-gray-500">Top 5 siswa</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            @if($topPrestasi->count() > 0)
            <div class="space-y-3">
                @foreach ($topPrestasi as $index => $siswa)
                <div class="flex items-center gap-4 p-4 bg-gray-50 hover:bg-primary/5 rounded-xl transition-all duration-200 group border border-transparent hover:border-primary/20">
                    <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center text-white font-bold shadow-lg group-hover:scale-105 transition-transform
                        {{ $index == 0 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 
                           ($index == 1 ? 'bg-gradient-to-r from-gray-300 to-gray-500' : 
                           ($index == 2 ? 'bg-gradient-to-r from-orange-400 to-orange-600' : 'bg-gradient-to-br from-primary to-purple-600')) }}">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-800 truncate mb-0.5">{{ $siswa->nama }}</p>
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fas fa-school text-primary"></i>
                            <span>{{ $siswa->kelas->nama_kelas ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-primary">{{ $siswa->prestasi_count }} prestasi</p>
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
            </div>
            @endif
        </div>
    </div>

</div>

<!-- Akses Cepat -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
    <div class="flex items-center gap-3 mb-6">
        <div class="bg-gradient-to-br from-primary to-purple-600 p-3 rounded-xl shadow-lg">
            <i class="fas fa-rocket text-white text-xl"></i>
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-800">Akses Cepat</h2>
            <p class="text-xs text-gray-500">Menu utama untuk pengelolaan sistem</p>
        </div>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('datasiswa.index') }}" 
           class="group relative overflow-hidden bg-gray-50 hover:bg-primary/5 p-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 border border-transparent hover:border-primary/20 text-center">
            <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary/10 to-purple-600/10 group-hover:from-primary group-hover:to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all shadow-md">
                <i class="fas fa-users text-primary group-hover:text-white text-xl transition-colors"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Data Siswa</h3>
            <p class="text-xs text-gray-500">Kelola data siswa</p>
        </a>
        
        <a href="{{ route('walikelas.index') }}" 
           class="group relative overflow-hidden bg-gray-50 hover:bg-primary/5 p-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 border border-transparent hover:border-primary/20 text-center">
            <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary/10 to-purple-600/10 group-hover:from-primary group-hover:to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all shadow-md">
                <i class="fas fa-chalkboard-teacher text-primary group-hover:text-white text-xl transition-colors"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Wali Kelas</h3>
            <p class="text-xs text-gray-500">Kelola wali kelas</p>
        </a>
        
        <a href="{{ route('datapetugas.index') }}" 
           class="group relative overflow-hidden bg-gray-50 hover:bg-primary/5 p-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 border border-transparent hover:border-primary/20 text-center">
            <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary/10 to-purple-600/10 group-hover:from-primary group-hover:to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all shadow-md">
                <i class="fas fa-user-shield text-primary group-hover:text-white text-xl transition-colors"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Petugas</h3>
            <p class="text-xs text-gray-500">Kelola petugas</p>
        </a>
        
        <a href="{{ route('jenispelanggaran.index') }}" 
           class="group relative overflow-hidden bg-gray-50 hover:bg-primary/5 p-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 border border-transparent hover:border-primary/20 text-center">
            <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary/10 to-purple-600/10 group-hover:from-primary group-hover:to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all shadow-md">
                <i class="fas fa-exclamation-circle text-primary group-hover:text-white text-xl transition-colors"></i>
            </div>
            <h3 class="font-bold text-gray-800 mb-1">Jenis Pelanggaran</h3>
            <p class="text-xs text-gray-500">Kelola pelanggaran</p>
        </a>
    </div>
</div>

<style>
/* Chart Container Fix */
.chart-container {
    position: relative;
    height: 256px !important;
    width: 100% !important;
}

#trenChart {
    display: block !important;
    width: 100% !important;
    height: 100% !important;
}

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

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>



<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tunggu sebentar agar DOM sepenuhnya dimuat
    setTimeout(function() {
        // Data dari controller
        const labels = @json($chartLabels);
        const pelanggaranData = @json($chartPelanggaran);
        const prestasiData = @json($chartPrestasi);

        // DEBUG: Log data ke console
        console.log('Labels:', labels);
        console.log('Pelanggaran:', pelanggaranData);
        console.log('Prestasi:', prestasiData);

        // Cek apakah elemen canvas ada
        const chartCanvas = document.getElementById('trenChart');
        if(chartCanvas) {
            console.log('Canvas element found!');
            
            // Set ukuran canvas secara eksplisit
            const container = chartCanvas.parentElement;
            chartCanvas.width = container.offsetWidth;
            chartCanvas.height = container.offsetHeight;
            
            // Get the context
            const ctx = chartCanvas.getContext('2d');
            
            // Gradien untuk pelanggaran
            const pelanggaranGradient = ctx.createLinearGradient(0, 0, 0, 300);
            pelanggaranGradient.addColorStop(0, 'rgba(239, 68, 68, 0.2)');
            pelanggaranGradient.addColorStop(1, 'rgba(239, 68, 68, 0.01)');
            
            // Gradien untuk prestasi
            const prestasiGradient = ctx.createLinearGradient(0, 0, 0, 300);
            prestasiGradient.addColorStop(0, 'rgba(16, 185, 129, 0.2)');
            prestasiGradient.addColorStop(1, 'rgba(16, 185, 129, 0.01)');
            
            // Buat grafik baru
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Pelanggaran',
                            data: pelanggaranData,
                            borderColor: '#ef4444',
                            backgroundColor: pelanggaranGradient,
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: '#ef4444',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Prestasi',
                            data: prestasiData,
                            borderColor: '#10b981',
                            backgroundColor: prestasiGradient,
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: '#10b981',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 15,
                                font: {
                                    size: 12,
                                    family: "'Inter', sans-serif"
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleColor: '#fff',
                            titleFont: {
                                size: 14,
                                weight: 'bold'
                            },
                            bodyColor: '#fff',
                            bodyFont: {
                                size: 13
                            },
                            borderColor: '#374151',
                            borderWidth: 1,
                            displayColors: true,
                            intersect: false,
                            mode: 'index',
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.parsed.y + ' kasus';
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                                drawBorder: false
                            },
                            ticks: {
                                padding: 10,
                                font: {
                                    size: 12
                                },
                                color: '#6b7280',
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : null;
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                padding: 10,
                                font: {
                                    size: 12
                                },
                                color: '#6b7280'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeInOutQuart'
                    }
                }
            });
            
            console.log('Chart created successfully!');
        } else {
            console.error('Canvas element with ID "trenChart" NOT found!');
        }
    }, 100);
});

// Counter Animation untuk Angka Statistik
function animateValue(element, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const value = Math.floor(progress * (end - start) + start);
        element.textContent = value.toLocaleString('id-ID');
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

// Jalankan animasi counter setelah halaman load
setTimeout(() => {
    document.querySelectorAll('[data-count]').forEach(el => {
        const target = parseInt(el.getAttribute('data-count'));
        animateValue(el, 0, target, 1000);
    });
}, 200);
</script>
@endpush

@endsection