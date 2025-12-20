@extends('dashboard.guru.main')

@section('content')
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-primary to-purple-800 rounded-xl p-6 text-white shadow-lg mb-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold mb-2">Selamat Datang di Website Informasi E-Point Siswa</h2>
                            <p class="text-purple-200">Pantau perkembangan kedisiplinan siswa di kelas Anda</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="text-4xl font-bold">
                                <span id="current-time"></span>
                            </div>
                            <div class="text-sm text-purple-200" id="current-date"></div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <a href="/guru/pelanggaran/create" class="bg-white rounded-xl shadow p-6 flex items-center space-x-4 hover:shadow-lg transition-shadow card-hover">
                        <div class="w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center">
                            <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Catat Pelanggaran</p>
                            <p class="text-sm text-gray-500">Tambahkan pelanggaran siswa</p>
                        </div>
                    </a>
                    
                    <a href="/guru/kebaikan/create" class="bg-white rounded-xl shadow p-6 flex items-center space-x-4 hover:shadow-lg transition-shadow card-hover">
                        <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Catat Kebaikan</p>
                            <p class="text-sm text-gray-500">Tambahkan poin kebaikan siswa</p>
                        </div>
                    </a>
                    
                    <a href="/guru/laporan" class="bg-white rounded-xl shadow p-6 flex items-center space-x-4 hover:shadow-lg transition-shadow card-hover">
                        <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-file-alt text-blue-500 text-xl"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Buat Laporan</p>
                            <p class="text-sm text-gray-500">Cetak laporan kedisiplinan</p>
                        </div>
                    </a>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-xl shadow p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-user-graduate text-primary text-xl"></i>
                            </div>
                            <span class="text-xs font-medium text-green-500 bg-green-100 px-2 py-1 rounded-full">+12%</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Siswa</p>
                            <p class="text-3xl font-bold text-primary">36</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-xl shadow p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-primary text-xl"></i>
                            </div>
                            <span class="text-xs font-medium text-red-500 bg-red-100 px-2 py-1 rounded-full">+8%</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Pelanggaran Bulan Ini</p>
                            <p class="text-3xl font-bold text-primary">15</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-xl shadow p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-award text-primary text-xl"></i>
                            </div>
                            <span class="text-xs font-medium text-green-500 bg-green-100 px-2 py-1 rounded-full">+15%</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Kebaikan Bulan Ini</p>
                            <p class="text-3xl font-bold text-primary">22</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-xl shadow p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-chart-line text-primary text-xl"></i>
                            </div>
                            <span class="text-xs font-medium text-blue-500 bg-blue-100 px-2 py-1 rounded-full">Netto</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Poin</p>
                            <p class="text-3xl font-bold text-primary">+35</p>
                        </div>
                    </div>
                </div>

                <!-- Charts and Tables Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Chart -->
                    <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-bold text-primary">Grafik Perkembangan Siswa</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs bg-primary text-white rounded-lg">Bulan Ini</button>
                                <button class="px-3 py-1 text-xs bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Semester</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="developmentChart"></canvas>
                        </div>
                    </div>

                    <!-- Top Students -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <h3 class="text-lg font-bold text-primary mb-6">Peringkat Siswa</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center">
                                        <span class="text-yellow-600 font-bold">1</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">Ahmad Rizki</p>
                                        <p class="text-sm text-gray-500">XII RPL 1</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-green-500">+25</p>
                                    <p class="text-sm text-gray-500">Poin</p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <span class="text-gray-600 font-bold">2</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">Siti Nurhaliza</p>
                                        <p class="text-sm text-gray-500">XII RPL 1</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-green-500">+18</p>
                                    <p class="text-sm text-gray-500">Poin</p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-orange-100 flex items-center justify-center">
                                        <span class="text-orange-600 font-bold">3</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">Budi Santoso</p>
                                        <p class="text-sm text-gray-500">XII RPL 1</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-green-500">+12</p>
                                    <p class="text-sm text-gray-500">Poin</p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <span class="text-gray-600 font-bold">4</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">Dewi Lestari</p>
                                        <p class="text-sm text-gray-500">XII RPL 1</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-red-500">-5</p>
                                    <p class="text-sm text-gray-500">Poin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities Table -->
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-primary">Aktivitas Terkini Siswa</h3>
                        <div class="relative">
                            <input type="text" placeholder="Cari Siswa..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Siswa</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poin</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ahmad Rizki</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Pelanggaran
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Terlambat</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-500">-5</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Siti Nurhaliza</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Kebaikan
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Membantu teman</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-500">+10</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Budi Santoso</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Pelanggaran
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Tidak memakai seragam</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-500">-10</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">9 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Dewi Lestari</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Kebaikan
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Menjaga kebersihan kelas</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-500">+5</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <div class="text-sm text-gray-700">
                            Menampilkan <span class="font-medium">1</span> hingga <span class="font-medium">4</span> dari <span class="font-medium">20</span> hasil
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-3 py-1 text-sm bg-primary text-white rounded-lg">1</button>
                            <button class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">2</button>
                            <button class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">3</button>
                            <button class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </main>

            <script>
                // Development Chart
                document.addEventListener('DOMContentLoaded', function() {
                    const ctx = document.getElementById('developmentChart').getContext('2d');
                    const developmentChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                            datasets: [{
                                label: 'Pelanggaran',
                                data: [5, 8, 6, 9, 7, 5],
                                borderColor: 'rgb(239, 68, 68)',
                                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                                tension: 0.3,
                                fill: true
                            }, {
                                label: 'Kebaikan',
                                data: [12, 15, 18, 14, 20, 22],
                                borderColor: 'rgb(34, 197, 94)',
                                backgroundColor: 'rgba(34, 197, 94, 0.1)',
                                tension: 0.3,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
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
                            },
                            plugins: {
                                legend: {
                                    position: 'top',
                                }
                            }
                        }
                    });
                });
            </script>
@endsection