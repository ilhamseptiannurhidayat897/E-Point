@extends('dashboard.admin.main')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-6 text-white shadow-lg mb-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold mb-2">Selamat Datang di Website Informasi E-Point Siswa</h2>
            <p class="text-purple-200">Kelola data siswa, kebaikan, dan pelanggaran dengan mudah</p>
        </div>
        <div class="hidden md:block">
            <div class="text-4xl font-bold">
                <span id="current-time"></span>
            </div>
            <div class="text-sm text-purple-200" id="current-date"></div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
    <div class="bg-white rounded-xl shadow p-4 md:p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Total Siswa</p>
        <h3 class="text-3xl font-bold text-blue-600">{{ $totalSiswa }}</h3>
        <div class="mt-2 flex items-center text-xs text-blue-600">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414l-4-4a1 1 0 00-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span>12% dari bulan lalu</span>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow p-4 md:p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-indigo-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5-10v4a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Total Kelas</p>
        <h3 class="text-3xl font-bold text-indigo-600">{{ $totalKelas }}</h3>
        <div class="mt-2 flex items-center text-xs text-indigo-600">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414l-4-4a1 1 0 00-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span>8% dari bulan lalu</span>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow p-4 md:p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Total Pelanggaran</p>
        <h3 class="text-3xl font-bold text-red-600">{{ $totalPelanggaran }}</h3>
        <div class="mt-2 flex items-center text-xs text-red-600">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2 1 1 0 010 2zm-7 4a1 1 0 11-2 0 1 1 0 012 0zM5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414l-4-4a1 1 0 00-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span>5% dari bulan lalu</span>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow p-4 md:p-6 border border-gray-100 card-hover">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <p class="text-gray-500 text-sm">Total Prestasi</p>
        <h3 class="text-3xl font-bold text-green-600">{{ $totalPrestasi }}</h3>
        <div class="mt-2 flex items-center text-xs text-green-600">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2 1 1 0 010 2zm-7 4a1 1 0 11-2 0 1 1 0 012 0zM5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414l-4-4a1 1 0 00-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span>15% dari bulan lalu</span>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6 md:mb-8">
    <!-- Chart Pelanggaran per Bulan -->
    <div class="bg-white rounded-xl shadow p-4 md:p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base md:text-lg font-semibold text-gray-800">Pelanggaran per Bulan</h3>
            <button class="text-primary hover:text-purple-700 text-sm font-medium">
                Lihat Detail
            </button>
        </div>
        <div class="relative h-64">
            <canvas id="pelanggaranChart"></canvas>
        </div>
    </div>
    
    <!-- Chart Prestasi per Bulan -->
    <div class="bg-white rounded-xl shadow p-4 md:p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base md:text-lg font-semibold text-gray-800">Prestasi per Bulan</h3>
            <button class="text-primary hover:text-purple-700 text-sm font-medium">
                Lihat Detail
            </button>
        </div>
        <div class="relative h-64">
            <canvas id="prestasiChart"></canvas>
        </div>
    </div>
</div>

<!-- Tables Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Pelanggaran Terbaru -->
    <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-100">
        <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100">
            <h3 class="text-base md:text-lg font-semibold text-gray-800 flex items-center">
                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
                Pelanggaran Terbaru
            </h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($pelanggaranTerbaru as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">
                            @if($item->siswa)
                            <div class="flex items-center">
                                <div class="h-8 w-8 flex-shrink-0 rounded-full bg-gradient-to-br from-red-500 to-red-700 flex items-center justify-center text-white font-semibold text-xs">
                                    {{ strtoupper(substr($item->siswa->nama ?? '?', 0, 2)) }}
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->siswa->nama }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->siswa->kelas->nama_kelas ?? '-' }}</div>
                                </div>
                            </div>
                            @else
                            <div class="text-sm text-gray-500">Data siswa tidak tersedia</div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            @if($item->jenispelanggaran)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                {{ $item->jenispelanggaran->nama }}
                            </span>
                            @else
                            <span class="text-gray-400 text-xs">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-8 text-center">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <h3 class="text-base font-medium text-gray-900 mb-1">Belum ada data pelanggaran</h3>
                            <p class="text-sm text-gray-500">Data pelanggaran akan muncul di sini</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Prestasi Terbaru -->
    <div class="bg-white rounded-xl shadow overflow-hidden border border-gray-100">
        <div class="px-4 md:px-6 py-3 md:py-4 border-b border-gray-100">
            <h3 class="text-base md:text-lg font-semibold text-gray-800 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Prestasi Terbaru
            </h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($prestasiTerbaru as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">
                            @if($item->siswa)
                            <div class="flex items-center">
                                <div class="h-8 w-8 flex-shrink-0 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-white font-semibold text-xs">
                                    {{ strtoupper(substr($item->siswa->nama ?? '?', 0, 2)) }}
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->siswa->nama }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->siswa->kelas->nama_kelas ?? '-' }}</div>
                                </div>
                            </div>
                            @else
                            <div class="text-sm text-gray-500">Data siswa tidak tersedia</div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            @if($item->jenis)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ $item->jenis->nama }}
                            </span>
                            @else
                            <span class="text-gray-400 text-xs">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-8 text-center">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="text-base font-medium text-gray-900 mb-1">Belum ada data prestasi</h3>
                            <p class="text-sm text-gray-500">Data prestasi akan muncul di sini</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(43, 27, 100, 0.12);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    // Update current time
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
        const dateString = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        
        document.getElementById('current-time').textContent = timeString;
        document.getElementById('current-date').textContent = dateString;
    }
    
    updateTime();
    setInterval(updateTime, 1000);
    
    document.addEventListener('DOMContentLoaded', function() {
        // Chart Pelanggaran
        const pelanggaranCtx = document.getElementById('pelanggaranChart').getContext('2d');
        const pelanggaranChart = new Chart(pelanggaranCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Jumlah Pelanggaran',
                    data: [12, 19, 15, 25, 22, 30],
                    backgroundColor: 'rgba(239, 68, 68, 0.5)',
                    borderColor: 'rgba(239, 68, 68, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Chart Prestasi
        const prestasiCtx = document.getElementById('prestasiChart').getContext('2d');
        const prestasiChart = new Chart(prestasiCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Jumlah Prestasi',
                    data: [25, 32, 28, 42, 35, 48],
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endpush