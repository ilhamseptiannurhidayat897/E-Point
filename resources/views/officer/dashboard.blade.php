<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point Dashboard</title>
    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #2B1B64;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1a0f3d;
        }
        
        /* Animasi */
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(43, 27, 100, 0.1);
        }
        
        /* Sidebar animation */
        .sidebar-item {
            position: relative;
            overflow: hidden;
        }
        .sidebar-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background-color: #F2C94C;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .sidebar-item:hover::before,
        .sidebar-item.active::before {
            transform: translateX(0);
        }
        
        /* Chart container */
        .chart-container {
            position: relative;
            height: 300px;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- SIDEBAR -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 bg-primary text-white p-6 space-y-6 fixed md:relative transform md:translate-x-0 -translate-x-full transition-all duration-300 z-50 h-full overflow-y-auto shadow-xl">

            <div class="flex items-center space-x-3 pb-6 border-b border-purple-800">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-accent to-yellow-400 flex items-center justify-center">
                    <img src="smkn1kawali.jpg" alt="logo SMKN 1 Kawali">
                </div>
                <div>
                    <h2 class="text-xl font-bold">E-Point</h2>
                    <p class="text-xs text-purple-300">Sistem Informasi</p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="/dashboard" class="sidebar-item active flex items-center gap-3 px-4 py-3 rounded-lg bg-purple-900 text-accent font-medium">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/kebaikan/create" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
                    <i class="fas fa-star w-5 text-center"></i>
                    <span>Input Kebaikan</span>
                </a>
                <a href="/pelanggaran/create" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
                    <i class="fas fa-exclamation-triangle w-5 text-center"></i>
                    <span>Input Pelanggaran</span>
                </a>
                <a href="/kelas" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
                    <i class="fas fa-school w-5 text-center"></i>
                    <span>Data Kelas</span>
                </a>
                <a href="/siswa" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span>Data Siswa</span>
                </a>
                <a href="/laporan" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
                    <i class="fas fa-file-alt w-5 text-center"></i>
                    <span>Laporan</span>
                </a>
            </nav>
            
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-purple-800">
                <a href="/logout" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
                    <i class="fas fa-sign-out-alt w-5 text-center"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Overlay mobile -->
        <div id="overlay"
            class="hidden fixed inset-0 bg-black/50 md:hidden z-30"
            onclick="toggleSidebar()"></div>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Navbar -->
            <header class="w-full shadow-sm bg-white border-b border-gray-200 flex justify-between items-center px-6 py-4">
                <button onclick="toggleSidebar()" class="md:hidden text-primary text-xl">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="flex items-center space-x-4">
                    <h1 class="text-xl font-bold text-primary">Dashboard E-Point</h1>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-600 hover:text-primary focus:outline-none">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-accent rounded-full"></span>
                    </button>
                    <div class="flex items-center space-x-3 cursor-pointer">
                        <div class="relative">
                            <span class="w-2 h-2 bg-green-500 rounded-full absolute bottom-0 right-0 border-2 border-white"></span>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold">
                                YA
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-medium text-gray-800">Yesaya Abraham</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                <!-- Welcome Banner -->
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
                            <p class="text-3xl font-bold text-primary">1,800</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-xl shadow p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-primary text-xl"></i>
                            </div>
                            <span class="text-xs font-medium text-green-500 bg-green-100 px-2 py-1 rounded-full">+5%</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Guru</p>
                            <p class="text-3xl font-bold text-primary">120</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-xl shadow p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-school text-primary text-xl"></i>
                            </div>
                            <span class="text-xs font-medium text-blue-500 bg-blue-100 px-2 py-1 rounded-full">0%</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Kelas</p>
                            <p class="text-3xl font-bold text-primary">50</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-xl shadow p-6 card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                                <i class="fas fa-building text-primary text-xl"></i>
                            </div>
                            <span class="text-xs font-medium text-blue-500 bg-blue-100 px-2 py-1 rounded-full">0%</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Lokasi</p>
                            <p class="text-3xl font-bold text-primary">7</p>
                        </div>
                    </div>
                </div>

                <!-- Charts and Tables Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Chart -->
                    <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-bold text-primary">Laporan Per Bulan</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs bg-primary text-white rounded-lg">Bulan Ini</button>
                                <button class="px-3 py-1 text-xs bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Tahun Ini</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>

                    <!-- Stats Summary -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <h3 class="text-lg font-bold text-primary mb-6">Ringkasan Poin</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center">
                                        <i class="fas fa-exclamation-circle text-red-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Pelanggaran</p>
                                        <p class="text-sm text-gray-500">Bulan Ini</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-red-500">100</p>
                                    <p class="text-sm text-gray-500">75 Poin</p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Kebaikan</p>
                                        <p class="text-sm text-gray-500">Bulan Ini</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-green-500">25</p>
                                    <p class="text-sm text-gray-500">25 Poin</p>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-balance-scale text-blue-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Netto</p>
                                        <p class="text-sm text-gray-500">Selisih</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-blue-500">-50</p>
                                    <p class="text-sm text-gray-500">Poin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities Table -->
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-primary">Riwayat Pelanggaran & Kebaikan</h3>
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poin</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ahmad Rizki</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">XII RPL 1</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Pelanggaran
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Terlambat</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-500">-5</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Siti Nurhaliza</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">XI TKJ 2</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Kebaikan
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Membantu teman</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-500">+10</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Budi Santoso</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">X MM 1</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Pelanggaran
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Tidak memakai seragam</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-red-500">-10</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">9 Jun 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Dewi Lestari</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">XII AK 1</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Kebaikan
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Menjaga kebersihan kelas</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-green-500">+5</td>
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

        </div>

    </div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
    
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
    
    // Chart initialization
    const ctx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [
                {
                    label: 'Pelanggaran',
                    data: [65, 59, 80, 81, 56, 100],
                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                    borderColor: 'rgba(239, 68, 68, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Kebaikan',
                    data: [28, 48, 40, 19, 36, 25],
                    backgroundColor: 'rgba(16, 185, 129, 0.7)',
                    borderColor: 'rgba(16, 185, 129, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>