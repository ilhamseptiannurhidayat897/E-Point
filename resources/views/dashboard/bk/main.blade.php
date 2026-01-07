<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point Dashboard BK</title>

    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-900 antialiased">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar BK -->
    @include('dashboard.bk.sidebar')

    <!-- Mobile Overlay -->
    <div id="overlay"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm md:hidden z-30 hidden opacity-0 transition-opacity duration-300"
        onclick="closeSidebar()">
    </div>

    <!-- Main Wrapper -->
    <div class="flex-1 flex flex-col overflow-hidden w-full">

        <!-- Top Navbar -->
        <header class="sticky top-0 z-20 w-full bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between px-4 py-4">

                <!-- Left -->
                <div class="flex items-center gap-3">
                    <button onclick="toggleSidebar()" class="md:hidden p-2 text-primary hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <h1 class="text-lg font-bold text-primary">
                        Dashboard BK
                    </h1>
                </div>

                <!-- Right -->
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 p-2 hover:bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-purple-800
                                    flex items-center justify-center text-white font-semibold shadow-md">
                            BK
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-sm font-semibold text-gray-800">
                                {{ auth()->user()->bk->nama ?? 'BK' }}
                            </p>
                            <p class="text-xs text-gray-500">Bimbingan Konseling</p>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            <div class="container mx-auto px-4 py-6">
                @yield('content')
            </div>
        </main>

    </div>
</div>

{{-- JS SIDEBAR (PAKAI PUNYA ADMIN TANPA DIUBAH) --}}
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
        overlay.classList.toggle('opacity-0');
    }
</script>

@stack('scripts')
</body>
</html>
