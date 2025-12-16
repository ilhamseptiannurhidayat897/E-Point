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

<body class="bg-gray-50 text-gray-800 flex">

    {{-- SIDEBAR --}}
    @include('dashboard.guru.sidebar')

    {{-- CONTENT --}}
    <div class="flex-1 min-h-screen overflow-y-auto">
        @yield('content')
    </div>

    {{-- SCRIPT --}}
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            const dateString = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

            if (document.getElementById('current-time')) {
                document.getElementById('current-time').textContent = timeString;
                document.getElementById('current-date').textContent = dateString;
            }
        }

        updateTime();
        setInterval(updateTime, 1000);

        const chartCanvas = document.getElementById('monthlyChart');
        if (chartCanvas) {
            const ctx = chartCanvas.getContext('2d');
            new Chart(ctx, { /* config */ });
        }
    </script>

</body>


</body>
</html>