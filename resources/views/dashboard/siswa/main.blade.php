<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point | Siswa</title>

    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 text-gray-900">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    @include('dashboard.siswa.sidebar')

    {{-- OVERLAY MOBILE --}}
    <div id="overlay"
         class="fixed inset-0 bg-black/50 md:hidden z-30 hidden"
         onclick="closeSidebar()"></div>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- TOPBAR --}}
        <header class="bg-white shadow-sm border-b px-4 py-3 flex justify-between items-center">

            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="md:hidden text-primary">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <h1 class="text-lg font-bold text-primary">
                    Dashboard Siswa
                </h1>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-semibold">
                        {{ auth()->user()->login_id }}
                    </p>
                    <p class="text-xs text-gray-500">Siswa</p>
                </div>

                <div
                    class="w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center font-bold">
                    SW
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
        document.getElementById('sidebar')
            .classList.toggle('-translate-x-full');
        document.getElementById('overlay')
            .classList.toggle('hidden');
    }

    function closeSidebar() {
        document.getElementById('sidebar')
            .classList.add('-translate-x-full');
        document.getElementById('overlay')
            .classList.add('hidden');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
