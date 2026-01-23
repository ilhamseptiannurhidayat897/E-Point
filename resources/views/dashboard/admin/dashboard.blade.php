@extends('dashboard.admin.main')

@section('content')
<!-- Header dengan Purple Elegan -->
<div class="mb-8 relative overflow-hidden rounded-2xl bg-purple-800 p-6 text-white shadow-xl">
    <div class="absolute top-0 right-0 -mt-4 -mr-4 h-32 w-32 rounded-full bg-white/5"></div>
    <div class="absolute bottom-0 left-0 -mb-4 -ml-4 h-24 w-24 rounded-full bg-white/5"></div>
    <div class="absolute top-1/2 right-1/4 transform -translate-y-1/2 h-40 w-40 rounded-full bg-white/3 blur-xl"></div>
    
    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Dashboard Admin</h1>
            <p class="text-purple-100 mt-1 text-sm">Sistem Informasi E-Point SMKN 1 Kawali</p>
        </div>
        <div class="bg-white/10 backdrop-blur-sm rounded-lg px-4 py-2 text-sm border border-white/10">
            <i class="far fa-calendar-alt mr-2"></i>
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </div>
    </div>
</div>

<!-- Statistik Utama dengan Efek Hover dan Animasi -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">
        <div class="absolute top-0 right-0 h-16 w-16 bg-blue-50 rounded-bl-full opacity-70"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-2">
                <div class="text-gray-500 text-sm">Total Siswa</div>
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 text-sm"></i>
                </div>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ number_format($totalSiswa) }}</div>
            <div class="text-xs text-gray-400 mt-2 flex items-center">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                Aktif
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">
        <div class="absolute top-0 right-0 h-16 w-16 bg-purple-50 rounded-bl-full opacity-70"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-2">
                <div class="text-gray-500 text-sm">Total Kelas</div>
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-school text-purple-600 text-sm"></i>
                </div>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ number_format($totalKelas) }}</div>
            <div class="text-xs text-gray-400 mt-2 flex items-center">
                <span class="w-2 h-2 bg-purple-500 rounded-full mr-1"></span>
                Kelas
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">
        <div class="absolute top-0 right-0 h-16 w-16 bg-red-50 rounded-bl-full opacity-70"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-2">
                <div class="text-gray-500 text-sm">Pelanggaran</div>
                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle text-red-600 text-sm"></i>
                </div>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ number_format($totalPelanggaran) }}</div>
            <div class="text-xs text-gray-400 mt-2 flex items-center">
                <span class="w-2 h-2 bg-red-500 rounded-full mr-1"></span>
                {{ $pelanggaranBulanIni }} bulan ini
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">
        <div class="absolute top-0 right-0 h-16 w-16 bg-green-50 rounded-bl-full opacity-70"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-2">
                <div class="text-gray-500 text-sm">Prestasi</div>
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-trophy text-green-600 text-sm"></i>
                </div>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ number_format($totalPrestasi) }}</div>
            <div class="text-xs text-gray-400 mt-2 flex items-center">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                {{ $prestasiBulanIni }} bulan ini
            </div>
        </div>
    </div>
</div>

<!-- Chart & Data dengan Desain yang Ditingkatkan -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Chart dengan Efek Bayangan -->
   <!-- Chart dengan Efek Bayangan -->
<div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-gray-900">Tren Bulanan</h3>
        <div class="flex space-x-2">
            <button class="w-2 h-2 rounded-full bg-blue-500"></button>
            <button class="w-2 h-2 rounded-full bg-green-500"></button>
        </div>
    </div>
    <div class="h-64 relative chart-container">
        <canvas id="trenChart"></canvas>
    </div>
</div>
    
    <!-- Peran Sistem dengan Hover Effects -->
    <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
        <h3 class="font-semibold text-gray-900 mb-4">Pengguna Sistem</h3>
        <div class="space-y-3">
            <div class="flex items-center justify-between py-3 px-4 rounded-lg hover:bg-purple-50 transition-colors duration-200 group">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                        <i class="fas fa-crown text-purple-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Admin</span>
                </div>
                <span class="font-medium text-purple-600 bg-purple-50 px-3 py-1 rounded-full text-sm">1</span>
            </div>
            
            <div class="flex items-center justify-between py-3 px-4 rounded-lg hover:bg-blue-50 transition-colors duration-200 group">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                        <i class="fas fa-user-tie text-blue-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">BK</span>
                </div>
                <span class="font-medium text-blue-600 bg-blue-50 px-3 py-1 rounded-full text-sm">{{ $totalBK }}</span>
            </div>
            
            <div class="flex items-center justify-between py-3 px-4 rounded-lg hover:bg-green-50 transition-colors duration-200 group">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                        <i class="fas fa-chalkboard-teacher text-green-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Wali Kelas</span>
                </div>
                <span class="font-medium text-green-600 bg-green-50 px-3 py-1 rounded-full text-sm">{{ $totalWaliKelas }}</span>
            </div>
            
            <div class="flex items-center justify-between py-3 px-4 rounded-lg hover:bg-amber-50 transition-colors duration-200 group">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center mr-3 group-hover:bg-amber-200 transition-colors">
                        <i class="fas fa-user-shield text-amber-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Petugas</span>
                </div>
                <span class="font-medium text-amber-600 bg-amber-50 px-3 py-1 rounded-full text-sm">{{ $totalPetugas }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Data Terbaru dengan Desain yang Lebih Menarik -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Pelanggaran Terbaru -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-red-50 to-transparent">
            <h3 class="font-semibold text-gray-900 flex items-center">
                <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                Pelanggaran Terbaru
            </h3>
        </div>
        <div class="divide-y divide-gray-100">
            @foreach($pelanggaranTerbaru as $index => $item)
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-200" style="animation-delay: {{ $index * 50 }}ms">
                <div class="flex justify-between items-start">
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-user text-red-600 text-sm"></i>
                        </div>
                        <div>
                            <div class="font-medium text-gray-900">{{ $item->siswa->nama ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-500 mt-1">
                                {{ $item->siswa->kelas->nama_kelas ?? '-' }} • 
                                {{ $item->jenisPelanggaran->nama ?? 'Tidak diketahui' }}
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-red-600 bg-red-50 px-2 py-1 rounded">{{ $item->jenisPelanggaran->poin ?? 0 }} poin</div>
                        <div class="text-xs text-gray-400 mt-1">{{ $item->created_at->format('d/m') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- Prestasi Terbaru -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-transparent">
            <h3 class="font-semibold text-gray-900 flex items-center">
                <i class="fas fa-trophy text-green-500 mr-2"></i>
                Prestasi Terbaru
            </h3>
        </div>
        <div class="divide-y divide-gray-100">
            @foreach($prestasiTerbaru as $index => $item)
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-200" style="animation-delay: {{ $index * 50 }}ms">
                <div class="flex justify-between items-start">
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-award text-green-600 text-sm"></i>
                        </div>
                        <div>
                            <div class="font-medium text-gray-900">{{ $item->siswa->nama ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-500 mt-1">
                                {{ $item->siswa->kelas->nama_kelas ?? '-' }} • 
                                {{ $item->jenis->nama ?? 'Tidak diketahui' }}
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-green-600 bg-green-50 px-2 py-1 rounded">{{ $item->jenis->poin ?? 0 }} poin</div>
                        <div class="text-xs text-gray-400 mt-1">{{ $item->created_at->format('d/m') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Top Siswa dengan Desain yang Lebih Menarik -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Top Pelanggaran -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-red-50 to-transparent">
            <h3 class="font-semibold text-gray-900 flex items-center">
                <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                Siswa dengan Pelanggaran Terbanyak
            </h3>
        </div>
        <div class="divide-y divide-gray-100">
            @foreach($topPelanggaran as $index => $siswa)
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-200">
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-medium text-sm mr-3 
                        {{ $index == 0 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 
                           ($index == 1 ? 'bg-gradient-to-r from-gray-300 to-gray-500' : 
                           ($index == 2 ? 'bg-gradient-to-r from-orange-400 to-orange-600' : 'bg-red-500')) }}">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-gray-900">{{ $siswa->nama }}</div>
                        <div class="text-sm text-gray-500">{{ $siswa->kelas->nama_kelas ?? '-' }}</div>
                    </div>
                    <div class="bg-red-50 text-red-600 font-medium px-3 py-1 rounded-full text-sm">
                        {{ $siswa->pelanggaran_count }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- Top Prestasi -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-transparent">
            <h3 class="font-semibold text-gray-900 flex items-center">
                <i class="fas fa-trophy text-green-500 mr-2"></i>
                Siswa dengan Prestasi Terbanyak
            </h3>
        </div>
        <div class="divide-y divide-gray-100">
            @foreach($topPrestasi as $index => $siswa)
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-200">
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-medium text-sm mr-3 
                        {{ $index == 0 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 
                           ($index == 1 ? 'bg-gradient-to-r from-gray-300 to-gray-500' : 
                           ($index == 2 ? 'bg-gradient-to-r from-orange-400 to-orange-600' : 'bg-green-500')) }}">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex-1">
                        <div class="font-medium text-gray-900">{{ $siswa->nama }}</div>
                        <div class="text-sm text-gray-500">{{ $siswa->kelas->nama_kelas ?? '-' }}</div>
                    </div>
                    <div class="bg-green-50 text-green-600 font-medium px-3 py-1 rounded-full text-sm">
                        {{ $siswa->prestasi_count }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Akses Cepat dengan Desain yang Lebih Modern -->
<div class="mt-8 p-6 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl shadow-sm">
    <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
        <i class="fas fa-rocket text-purple-500 mr-2"></i>
        Akses Cepat
    </h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('datasiswa.index') }}" 
           class="bg-white p-5 rounded-xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300 text-center group">
            <div class="w-12 h-12 mx-auto bg-blue-100 rounded-lg flex items-center justify-center mb-3 group-hover:bg-blue-200 transition-colors">
                <i class="fas fa-users text-blue-600 text-lg"></i>
            </div>
            <div class="text-sm font-medium text-gray-900">Data Siswa</div>
        </a>
        
        <a href="{{ route('walikelas.index') }}" 
           class="bg-white p-5 rounded-xl border border-gray-200 hover:border-green-300 hover:shadow-lg transition-all duration-300 text-center group">
            <div class="w-12 h-12 mx-auto bg-green-100 rounded-lg flex items-center justify-center mb-3 group-hover:bg-green-200 transition-colors">
                <i class="fas fa-chalkboard-teacher text-green-600 text-lg"></i>
            </div>
            <div class="text-sm font-medium text-gray-900">Wali Kelas</div>
        </a>
        
        <a href="{{ route('datapetugas.index') }}" 
           class="bg-white p-5 rounded-xl border border-gray-200 hover:border-amber-300 hover:shadow-lg transition-all duration-300 text-center group">
            <div class="w-12 h-12 mx-auto bg-amber-100 rounded-lg flex items-center justify-center mb-3 group-hover:bg-amber-200 transition-colors">
                <i class="fas fa-user-shield text-amber-600 text-lg"></i>
            </div>
            <div class="text-sm font-medium text-gray-900">Petugas</div>
        </a>
        
        <a href="{{ route('jenispelanggaran.index') }}" 
           class="bg-white p-5 rounded-xl border border-gray-200 hover:border-red-300 hover:shadow-lg transition-all duration-300 text-center group">
            <div class="w-12 h-12 mx-auto bg-red-100 rounded-lg flex items-center justify-center mb-3 group-hover:bg-red-200 transition-colors">
                <i class="fas fa-exclamation-circle text-red-600 text-lg"></i>
            </div>
            <div class="text-sm font-medium text-gray-900">Jenis Pelanggaran</div>
        </a>
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

/* Chart Container Fix */
.chart-container {
    position: relative;
    height: 256px !important; /* h-64 = 256px */
    width: 100% !important;
}

#trenChart {
    display: block !important;
    width: 100% !important;
    height: 100% !important;
}
</style>

@push('scripts')
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
                                padding: 15
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#ddd',
                            borderWidth: 1,
                            displayColors: true,
                            intersect: false
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
                                padding: 10
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                padding: 10
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeOutQuart'
                    }
                }
            });
            
            console.log('Chart created successfully!');
        } else {
            console.error('Canvas element with ID "trenChart" NOT found!');
        }
    }, 100); // Tunggu 100ms untuk memastikan DOM sepenuhnya dimuat
});
</script>
@endpush
@endsection