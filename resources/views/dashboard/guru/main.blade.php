<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point Dashboard Guru</title>
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

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('dashboard.guru.sidebar')

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
                    <h1 class="text-xl font-bold text-primary">Dashboard Guru</h1>
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
                            <p class="text-xs text-gray-500">Guru</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            @yield('content')
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
    </script>
</body>
</html>