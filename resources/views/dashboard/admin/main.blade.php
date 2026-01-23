<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point Dashboard Admin</title>
    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #2B1B64;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1a0f3d;
        }
        
        /* Card Hover Animation */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(43, 27, 100, 0.12);
        }
        
        /* Sidebar Item Animation */
        .sidebar-item {
            position: relative;
            overflow: hidden;
            transition: all 0.2s ease;
        }
        .sidebar-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #F2C94C, #F2994A);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .sidebar-item:hover::before,
        .sidebar-item.active::before {
            transform: translateX(0);
        }
        
        /* Smooth Transitions */
        #sidebar {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        #overlay {
            transition: opacity 0.3s ease;
        }
        
        /* Prevent Body Scroll on Mobile Sidebar Open */
        body.sidebar-open {
            overflow: hidden;
        }
        
        /* Chart Container */
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        /* Loading Animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Mobile Optimizations */
        @media (max-width: 768px) {
            body.sidebar-open {
                overflow: hidden;
                position: fixed;
                width: 100%;
            }
        }
        
        /* Custom scrollbar for sidebar */
        .scrollbar-thin {
            scrollbar-width: thin;
        }
        .scrollbar-thumb-purple-700\/50::-webkit-scrollbar-thumb {
            background-color: rgba(109, 40, 217, 0.5);
            border-radius: 9999px;
        }
        .scrollbar-track-transparent::-webkit-scrollbar-track {
            background-color: transparent;
        }
        

    </style>
</head>

<body class="bg-gray-50 text-gray-900 antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Component -->
        @include('dashboard.admin.sidebar')

        <!-- Mobile Overlay -->
        <div id="overlay"
            class="fixed inset-0 bg-black/60 backdrop-blur-sm md:hidden z-30 hidden opacity-0 transition-opacity duration-300"
            onclick="closeSidebar()">
        </div>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col overflow-hidden w-full">

            <!-- Top Navigation Bar -->
            <header class="sticky top-0 z-20 w-full bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-3 sm:px-4 md:px-6 py-3 md:py-4">
                    
                    <!-- Left Section -->
                    <div class="flex items-center gap-3 md:gap-4">
                        <!-- Mobile Menu Toggle -->
                        <button 
                            onclick="toggleSidebar()" 
                            class="md:hidden p-2 text-primary hover:bg-gray-100 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-primary/20"
                            aria-label="Toggle Menu">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        
                        <!-- Page Title -->
                        <h1 class="text-base sm:text-lg md:text-xl font-bold text-primary truncate">
                            Dashboard Admin
                        </h1>
                    </div>

                    <!-- Right Section -->
                    <div class="flex items-center gap-2 md:gap-4">                      
                        <!-- User Profile -->
                        <div class="flex items-center gap-2 md:gap-3 p-1 md:p-2 hover:bg-gray-50 rounded-lg transition-colors cursor-pointer">
                            <div class="relative">
                                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold text-xs md:text-sm shadow-md">
                                    AD
                                </div>
                                <span class="absolute bottom-0 right-0 w-2.5 h-2.5 md:w-3 md:h-3 bg-green-500 rounded-full border-2 border-white"></span>
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-xs md:text-sm font-semibold text-gray-800 leading-tight">Admin</p>
                                <p class="text-xs text-gray-500 leading-tight">Administrator</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-3 sm:px-4 md:px-6 py-4 md:py-6 lg:py-8">
                    @yield('content')
                </div>
            </main>
    
        </div>
    </div>

    <script>
        // Toggle Sidebar Function
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const body = document.body;
            const isOpen = !sidebar.classList.contains('-translate-x-full');

            if (isOpen) {
                closeSidebar();
            } else {
                openSidebar();
            }
        }

        // Open Sidebar
        function openSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const body = document.body;

            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
            }, 10);
            
            if (window.innerWidth < 768) {
                body.classList.add('sidebar-open');
            }
        }

        // Close Sidebar
        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const body = document.body;

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('opacity-0');
            
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
            
            body.classList.remove('sidebar-open');
        }

        // Close on Escape Key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeSidebar();
            }
        });

        // Auto-close on Window Resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth >= 768) {
                    const sidebar = document.getElementById('sidebar');
                    const overlay = document.getElementById('overlay');
                    const body = document.body;
                    
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.add('hidden', 'opacity-0');
                    body.classList.remove('sidebar-open');
                }
            }, 250);
        });
        
        // Update Current Time (if elements exist)
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { 
                hour: '2-digit', 
                minute: '2-digit' 
            });
            const dateString = now.toLocaleDateString('id-ID', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            
            const timeElement = document.getElementById('current-time');
            const dateElement = document.getElementById('current-date');
            
            if (timeElement) timeElement.textContent = timeString;
            if (dateElement) dateElement.textContent = dateString;
        }
        
        // Initialize Time Update
        updateTime();
        setInterval(updateTime, 60000); // Update every minute
        
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>