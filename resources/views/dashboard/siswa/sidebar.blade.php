<aside id="sidebar"
    class="fixed md:relative
           inset-y-0 left-0
           w-64 bg-gradient-to-b from-white to-gray-50
           flex flex-col
           transform md:translate-x-0 -translate-x-full
           transition-transform duration-300 ease-in-out
           z-40 md:z-auto
           h-screen overflow-hidden
           shadow-xl border-r border-gray-200">

    <!-- Logo Header -->
    <div class="flex items-center gap-3 p-5 border-b border-gray-200 flex-shrink-0">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary to-purple-600 shadow-lg flex items-center justify-center flex-shrink-0">
            <img src="{{ asset('logo/smkn1kawali.jpg') }}"
                 alt="Logo SMKN 1 Kawali"
                 class="w-10 h-10 rounded-lg object-cover">
        </div>
        <div class="flex-1 min-w-0">
            <h2 class="text-xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">E-Point</h2>
            <p class="text-xs text-gray-500 truncate">Dashboard Siswa</p>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-1 custom-scrollbar">
        
        <!-- Dashboard -->
        <a href="{{ route('dashboard.siswa') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('dashboard.siswa') 
                      ? 'bg-gradient-to-r from-primary/10 to-purple-600/10 text-primary border-l-4 border-primary shadow-sm' 
                      : 'text-gray-700 hover:bg-gray-100 hover:text-primary hover:translate-x-1 hover:shadow-sm' }}">
            <i class="fas fa-home w-5 text-center flex-shrink-0 {{ request()->routeIs('dashboard.siswa') ? 'text-primary' : 'text-gray-500' }}"></i>
            <span class="truncate">Dashboard</span>
            @if(request()->routeIs('dashboard.siswa'))
            <div class="ml-auto w-2 h-2 rounded-full bg-primary animate-pulse"></div>
            @endif
        </a>

<<<<<<< HEAD

=======
>>>>>>> 3df166f39387874691c7fe410cc59334cf4d50b6
        <!-- Divider -->
        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Aktivitas</p>
        </div>

        <!-- Prestasi -->
        <a href="{{ route('siswa.prestasi') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('siswa.prestasi*') 
                      ? 'bg-gradient-to-r from-primary/10 to-purple-600/10 text-primary border-l-4 border-primary shadow-sm' 
                      : 'text-gray-700 hover:bg-gray-100 hover:text-primary hover:translate-x-1 hover:shadow-sm' }}">
            <i class="fas fa-trophy w-5 text-center flex-shrink-0 {{ request()->routeIs('siswa.prestasi*') ? 'text-primary' : 'text-gray-500' }}"></i>
            <span class="truncate">Prestasi</span>
        </a>

        <!-- Pelanggaran -->
        <a href="{{ route('siswa.pelanggaran') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('siswa.pelanggaran*') 
                      ? 'bg-gradient-to-r from-primary/10 to-purple-600/10 text-primary border-l-4 border-primary shadow-sm' 
                      : 'text-gray-700 hover:bg-gray-100 hover:text-primary hover:translate-x-1 hover:shadow-sm' }}">
            <i class="fas fa-exclamation-triangle w-5 text-center flex-shrink-0 {{ request()->routeIs('siswa.pelanggaran*') ? 'text-primary' : 'text-gray-500' }}"></i>
            <span class="truncate">Pelanggaran</span>
        </a>

    </nav>

<<<<<<< HEAD

=======
>>>>>>> 3df166f39387874691c7fe410cc59334cf4d50b6
</aside>

<style>
/* Custom Scrollbar Styling untuk tema putih */
.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.03);
    border-radius: 10px;
    margin: 4px 0;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, rgba(107, 33, 168, 0.2), rgba(124, 58, 237, 0.15));
    border-radius: 10px;
    transition: background 0.3s ease;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, rgba(107, 33, 168, 0.3), rgba(124, 58, 237, 0.25));
}

/* Firefox scrollbar */
.custom-scrollbar {
    scrollbar-width: thin;
    scrollbar-color: rgba(107, 33, 168, 0.2) transparent;
}

/* Menu Item Styling dengan efek yang lebih halus */
.sidebar-menu-item {
    position: relative;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.sidebar-menu-item::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 2px;
    background: linear-gradient(to bottom, var(--primary), var(--purple-600));
    transform: scaleY(0);
    transform-origin: top;
    transition: transform 0.3s ease;
}

.sidebar-menu-item:hover::after {
    transform: scaleY(1);
}

/* Active menu dengan indikator yang lebih profesional */
.sidebar-menu-item[class*="border-primary"] {
    box-shadow: 0 2px 10px -2px rgba(107, 33, 168, 0.1);
}

/* Efek hover dengan gradient yang halus */
.sidebar-menu-item:hover {
    box-shadow: 0 4px 12px -2px rgba(107, 33, 168, 0.08);
}

/* Icon animation dengan warna tema */
.sidebar-menu-item:hover i {
    transform: translateX(2px);
    transition: transform 0.2s ease, color 0.2s ease;
}

/* Animasi untuk active indicator */
@keyframes fadeIn {
    from { opacity: 0; transform: translateX(-10px); }
    to { opacity: 1; transform: translateX(0); }
}

.sidebar-menu-item {
    animation: fadeIn 0.3s ease-out;
}

/* Staggered animation delay untuk menu items */
.sidebar-menu-item:nth-child(1) { animation-delay: 0.1s; }
.sidebar-menu-item:nth-child(2) { animation-delay: 0.15s; }
.sidebar-menu-item:nth-child(3) { animation-delay: 0.2s; }
.sidebar-menu-item:nth-child(4) { animation-delay: 0.25s; }
.sidebar-menu-item:nth-child(5) { animation-delay: 0.3s; }
.sidebar-menu-item:nth-child(6) { animation-delay: 0.35s; }
</style>