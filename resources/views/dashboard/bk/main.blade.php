<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point Dashboard BK</title>

    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        /* Mencegah elemen AlpineJS terlihat berkedip sebelum loading */
        [x-cloak] { display: none !important; }
    </style>

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
            <div class="flex items-center justify-between px-4 py-3">

                <!-- Left -->
                <div class="flex items-center gap-3">
                    <button onclick="toggleSidebar()" class="md:hidden text-primary hover:bg-gray-100 p-2 rounded-lg">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    
                </div>

                {{-- LOGIKA PHP UNTUK NAMA & INISIAL --}}
                @php
                    // Mengambil nama guru BK dari relasi, atau fallback
                    $namaBK = auth()->user()->bk->nama ?? 'Guru BK';
                    
                    // Membuat inisial otomatis
                    $inisial = collect(explode(' ', $namaBK))
                        ->map(fn ($n) => strtoupper(substr($n, 0, 1)))
                        ->take(2)
                        ->join('');
                @endphp

                <!-- Right (Dropdown Profile) -->
                <div x-data="{ open: false }" class="relative">
                    <!-- Trigger Button -->
                    <button @click="open = !open"
                        class="flex items-center gap-3 hover:bg-gray-100 px-3 py-2 rounded-xl transition">
                
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-gray-800 truncate">
                                {{ $namaBK }}
                            </p>
                            <p class="text-xs text-gray-500">Bimbingan Konseling</p>
                        </div>
                
                        <div class="w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center font-bold shadow-sm">
                            {{ $inisial }}
                        </div>
                        
                        <!-- Dropdown Icon -->
                        <i class="fas fa-chevron-down text-gray-500 text-xs transition-transform"
                           :class="open ? 'rotate-180' : ''"></i>
                    </button>
                
                    <!-- Popup Menu -->
                    <div x-show="open"
                        x-cloak
                        @click.outside="open = false"
                        x-transition
                        class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl
                                border border-gray-200 z-50 overflow-hidden">
                                
                        <!-- Menu Profil -->
                        <a href="{{ route('bk.profil') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm
                                text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-user w-4"></i>
                            Profil
                        </a>
                
                        <!-- Menu Logout -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3 text-sm
                                    text-red-600 hover:bg-red-50 transition">
                                <i class="fas fa-sign-out-alt w-4"></i>
                                Logout
                            </button>
                        </form>
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

{{-- Library AlpineJS --}}
<script src="//unpkg.com/alpinejs" defer></script>

@stack('scripts')
</body>
</html>