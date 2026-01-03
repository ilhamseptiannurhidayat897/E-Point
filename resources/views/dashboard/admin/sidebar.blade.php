<aside id="sidebar"
    class="w-64 bg-primary text-white flex flex-col
           transform md:translate-x-0 -translate-x-full
           transition-all duration-300 z-50
           h-screen overflow-y-auto shadow-xl">

    {{-- LOGO --}}
    <div class="flex items-center space-x-3 p-6 border-b border-purple-800">
        <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center shadow-md">
            <img src="{{ asset('logo/smkn1kawali.jpg') }}"
                 alt="logo SMKN 1 Kawali"
                 class="w-10 h-10 rounded-lg object-cover">
        </div>
        <div>
            <h2 class="text-xl font-bold">E-Point</h2>
            <p class="text-xs text-purple-300">Sistem Informasi</p>
        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 p-4 space-y-1">

        <!-- Dashboard -->
        <a href="{{ route('dashboard.admin') }}"
        class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg font-medium
        {{ request()->routeIs('dashboard.admin')
                ? 'bg-purple-900 text-accent'
                : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
            <i class="fas fa-home w-5 text-center"></i>
            <span>Dashboard</span>
        </a>

        <!-- bk -->
        <a href="{{ route('databk.index') }}"
        class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
        {{ request()->routeIs('databk.*')
                ? 'bg-purple-900 text-accent'
                : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
            <i class="fas fa-star w-5 text-center"></i>
            <span>Data BK</span>
        </a>

        <!-- petugas -->
        <a href="{{ route('datapetugas.index') }}"
        class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
        {{ request()->routeIs('datapetugas.*')
                ? 'bg-purple-900 text-accent'
                : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
            <i class="fas fa-star w-5 text-center"></i>
            <span>Data Petugas</span>
        </a>

        <a href="{{ route('datakelas.index') }}"
        class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
        {{ request()->routeIs('datakelas.*')
                ? 'bg-purple-900 text-accent'
                : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
            <i class="fas fa-star w-5 text-center"></i>
            <span>Data Kelas</span>
        </a>

        

    </nav>

    {{-- LOGOUT --}}
    <div class="p-6 border-t border-purple-800">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-3 w-full px-4 py-3 rounded-lg hover:bg-purple-900 text-purple-200 hover:text-white">
                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
