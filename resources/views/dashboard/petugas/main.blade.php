<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point | Petugas</title>

    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
          
    <style>
        /* Mencegah elemen AlpineJS terlihat berkedip sebelum loading */
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    @include('dashboard.petugas.sidebar')

    {{-- OVERLAY MOBILE --}}
    <div id="overlay"
         class="fixed inset-0 bg-black/50 md:hidden z-30 hidden"
         onclick="closeSidebar()"></div>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- HEADER --}}
        <header class="bg-white shadow-sm px-4 py-3 flex justify-between items-center sticky top-0 z-20">

            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="md:hidden text-primary">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-lg font-bold text-primary">
                    Dashboard Petugas
                </h1>
            </div>

            {{-- LOGIKA PHP UNTUK NAMA & INISIAL --}}
            @php
                // Mengambil nama user, jika tidak ada kolom 'name', gunakan 'login_id' sebagai fallback
                $namaPetugas = auth()->user()->name ?? auth()->user()->login_id ?? 'Petugas';
                
                // Membuat inisial otomatis (ambil 2 huruf depan)
                $inisial = collect(explode(' ', $namaPetugas))
                    ->map(fn ($n) => strtoupper(substr($n, 0, 1)))
                    ->take(2)
                    ->join('');
            @endphp

            {{-- DROPDOWN PROFIL (ALPINE JS) --}}
            <div x-data="{ open: false }" class="relative">
                
                {{-- TRIGGER BUTTON --}}
                <button @click="open = !open"
                    class="flex items-center gap-3 hover:bg-gray-100 px-3 py-2 rounded-xl transition">

                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-semibold text-gray-800 truncate">
                            {{ $namaPetugas }}
                        </p>
                        <p class="text-xs text-gray-500">Petugas</p>
                    </div>

                    <div class="w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center font-bold">
                        {{ $inisial }}
                    </div>
                </button>

                {{-- POPUP MENU --}}
                <div x-show="open"
                    x-cloak
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl
                            border border-gray-200 z-50 overflow-hidden">
                            
                    {{-- Menu Profil --}}
                    <a href="{{ route('petugas.profil.index') }}"
                    class="flex items-center gap-3 px-4 py-3 text-sm
                            text-gray-700 hover:bg-gray-100 transition">
                        <i class="fas fa-user w-4"></i>
                        Profil
                    </a>

                    {{-- Menu Logout --}}
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
        </header>

        {{-- CONTENT --}}
        <main class="flex-1 overflow-y-auto p-4 md:p-6">
            @yield('content')
        </main>

    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
    function toggleSidebar(){
        document.getElementById('sidebar').classList.toggle('-translate-x-full')
        document.getElementById('overlay').classList.toggle('hidden')
    }
    function closeSidebar(){
        document.getElementById('sidebar').classList.add('-translate-x-full')
        document.getElementById('overlay').classList.add('hidden')
    }
</script>

{{-- Library AlpineJS --}}
<script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>