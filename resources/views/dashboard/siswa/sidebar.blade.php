@extends('dashboard.siswa.main')

@section('layout')
<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="w-64 bg-primary text-white p-6 space-y-6 fixed md:relative transform md:translate-x-0 -translate-x-full transition-all duration-300 z-50 h-full overflow-y-auto shadow-xl">

        <div class="flex items-center space-x-3 pb-6 border-b border-purple-800">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-accent to-yellow-400 flex items-center justify-center">
                <img src="{{ asset('logo/logosmk.jpg') }}" class="w-10 h-10">
            </div>
            <div>
                <h2 class="text-xl font-bold">E-Point</h2>
                <p class="text-xs text-purple-300">Sistem Informasi</p>
            </div>
        </div>

        <nav class="space-y-1">
            <a href="/dashboard/siswa"
                class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
                {{ request()->is('dashboard/siswa') ? 'active bg-purple-900 text-accent' : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
                <i class="fas fa-home w-5"></i> Dashboard
            </a>

            <a href="/laporan"
                class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
                {{ request()->is('laporan') ? 'active bg-purple-900 text-accent' : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
                <i class="fas fa-file-alt w-5"></i> Riwayat Poin
            </a>
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="pt-6">
            @csrf
            <button class="w-full bg-red-600 hover:bg-red-700 py-2 rounded-lg">
                Logout
            </button>
        </form>
    </aside>

    <div id="overlay"
        class="hidden fixed inset-0 bg-black/50 md:hidden z-30"
        onclick="toggleSidebar()"></div>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- TOPBAR -->
        <header class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <button onclick="toggleSidebar()" class="md:hidden text-primary text-xl">
                <i class="fas fa-bars"></i>
            </button>

            <div>
                <h1 class="text-xl font-bold text-primary">@yield('title')</h1>
                <p class="text-xs text-gray-500" id="current-date"></p>
            </div>

           <div class="flex items-center gap-3">
    <div class="hidden md:block text-right">
        <p class="text-sm font-medium text-gray-800">Beckham Putra Nugraha</p>
        <p class="text-xs text-gray-500">XII TKR 3</p>
    </div>

    <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">
        BPN
    </div>
</div>

        </header>

        <!-- CONTENT -->
        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            @yield('content')
        </main>
    </div>
</div>
@endsection
