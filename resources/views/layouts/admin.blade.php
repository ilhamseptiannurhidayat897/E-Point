<!doctype html>
<html lang="id" class="h-full bg-[#0f1724]">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title','Dashboard') — E-Point</title>

  {{-- Tailwind output --}}
  <link rel="stylesheet" href="{{ asset('build/tailwind.css') }}">

  {{-- Chart.js CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="min-h-screen antialiased text-gray-200">

  <div class="flex h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#0e1622] border-r border-gray-800 p-4 hidden md:block">
      <div class="mb-8">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-[#4cc9f0] flex items-center justify-center font-bold text-[#0f1724]">EP</div>
          <div>
            <div class="font-semibold text-white">E-Point</div>
            <div class="text-xs text-gray-400">Sistem Pelanggaran Siswa</div>
          </div>
        </a>
      </div>

      <nav class="space-y-1 text-sm">
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded text-gray-200 hover:bg-[#13202a] {{ request()->routeIs('dashboard') ? 'bg-[#13202a] text-white' : '' }}">Dashboard</a>

        <a href="{{ route('students.index') }}" class="block px-3 py-2 rounded text-gray-200 hover:bg-[#13202a] {{ request()->routeIs('students.*') ? 'bg-[#13202a]' : '' }}">Siswa</a>

        <a href="{{ route('violations.index') }}" class="block px-3 py-2 rounded text-gray-200 hover:bg-[#13202a] {{ request()->routeIs('violations.*') ? 'bg-[#13202a]' : '' }}">Pelanggaran</a>

        <a href="{{ route('good-points.index') }}" class="block px-3 py-2 rounded text-gray-200 hover:bg-[#13202a] {{ request()->routeIs('good-points.*') ? 'bg-[#13202a]' : '' }}">Poin Baik</a>

        <a href="{{ route('violation-types.index') }}" class="block px-3 py-2 rounded text-gray-200 hover:bg-[#13202a] {{ request()->routeIs('violation-types.*') ? 'bg-[#13202a]' : '' }}">Jenis Pelanggaran</a>

        <a href="{{ route('good-point-types.index') }}" class="block px-3 py-2 rounded text-gray-200 hover:bg-[#13202a] {{ request()->routeIs('good-point-types.*') ? 'bg-[#13202a]' : '' }}">Jenis Poin Baik</a>
      </nav>
    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">
      {{-- header --}}
      <header class="flex items-center justify-between bg-[#0f1724] p-4 border-b border-gray-800">
        <div class="flex items-center gap-4">
          <button id="sidebarToggle" class="md:hidden p-2 rounded bg-[#13202a]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>

          <div>
            <h2 class="text-lg font-semibold">@yield('page_title','Dashboard')</h2>
            <div class="text-xs text-gray-400">@yield('page_subtitle','Ringkasan aktivitas & statistik')</div>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <div class="text-sm text-gray-400">Hai, <span class="text-white font-medium">{{ auth()->user()?->name ?? 'Admin' }}</span></div>
          <a href="#" class="px-3 py-1 bg-[#4cc9f0] rounded text-[#0f1724] text-sm">Logout</a>
        </div>
      </header>

      <main class="p-6 overflow-auto">
        @yield('content')
      </main>
    </div>
  </div>

  {{-- Simple script to toggle sidebar on mobile --}}
  <script>
    (function(){
      const btn = document.getElementById('sidebarToggle');
      const aside = document.querySelector('aside');
      if(!btn || !aside) return;
      btn.addEventListener('click', ()=> {
        aside.classList.toggle('hidden');
      });
    })();
  </script>
</body>
</html>
