<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point | Petugas</title>

    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 antialiased">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    @include('dashboard.petugas.sidebar')

    {{-- OVERLAY MOBILE --}}
    <div id="overlay"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm md:hidden z-30 hidden"
         onclick="closeSidebar()"></div>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- HEADER --}}
        <header class="sticky top-0 z-20 bg-white border-b shadow-sm">
            <div class="flex items-center justify-between px-4 py-3">

                <div class="flex items-center gap-3">
                    <button onclick="toggleSidebar()"
                            class="md:hidden text-primary">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-lg font-bold text-primary">
                        Dashboard Petugas
                    </h1>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-semibold">
                            {{ auth()->user()->login_id }}
                        </p>
                        <p class="text-xs text-gray-500">Petugas</p>
                    </div>
                    <div
                        class="w-9 h-9 rounded-full bg-gradient-to-br from-primary to-purple-800
                               text-white flex items-center justify-center font-bold">
                        PT
                    </div>
                </div>

            </div>
        </header>

        {{-- CONTENT --}}
        <main class="flex-1 overflow-y-auto p-4 md:p-6">
            @yield('content')
        </main>

    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('-translate-x-full');
        document.getElementById('overlay').classList.toggle('hidden');
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('overlay').classList.add('hidden');
    }
</script>

</body>
</html>
