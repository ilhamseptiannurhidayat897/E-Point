<aside id="sidebar"
    class="fixed md:relative
           inset-y-0 left-0
           w-64 bg-gradient-to-b from-primary to-purple-900 text-white
           flex flex-col
           transform md:translate-x-0 -translate-x-full
           transition-transform duration-300 ease-in-out
           z-40 md:z-auto
           h-screen overflow-hidden
           shadow-2xl md:shadow-xl">

    <!-- Logo Header -->
    <div class="flex items-center gap-3 p-5 border-b border-purple-700/50 flex-shrink-0">
        <div class="w-12 h-12 rounded-xl bg-white shadow-lg flex items-center justify-center flex-shrink-0">
            <img src="{{ asset('logo/smkn1kawali.jpg') }}"
                 alt="Logo SMKN 1 Kawali"
                 class="w-10 h-10 rounded-lg object-cover">
        </div>
        <div class="flex-1 min-w-0">
            <h2 class="text-xl font-bold text-white truncate">E-Point</h2>
            <p class="text-xs text-purple-200 truncate">Sistem Informasi</p>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-2 custom-scrollbar">
        
        <!-- Dashboard -->
        <a href="{{ route('dashboard.admin') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('dashboard.admin') 
                      ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400' 
                      : 'text-purple-200 hover:bg-purple-800/40 hover:text-white hover:translate-x-1' }}">
            <i class="fas fa-home w-5 text-center flex-shrink-0"></i>
            <span class="truncate">Dashboard</span>
        </a>

        <!-- Divider -->
        <div class="pt-3 pb-2">
            <p class="px-4 text-xs font-semibold text-purple-300 uppercase tracking-wider opacity-70">Data Master</p>
        </div>

        <!-- Data BK -->
        <a href="{{ route('databk.index') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('databk.*') 
                      ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400' 
                      : 'text-purple-200 hover:bg-purple-800/40 hover:text-white hover:translate-x-1' }}">
            <i class="fas fa-user-tie w-5 text-center flex-shrink-0"></i>
            <span class="truncate">Data BK</span>
        </a>

        <!-- Data Petugas -->
        <a href="{{ route('datapetugas.index') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('datapetugas.*') 
                      ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400' 
                      : 'text-purple-200 hover:bg-purple-800/40 hover:text-white hover:translate-x-1' }}">
            <i class="fas fa-user-shield w-5 text-center flex-shrink-0"></i>
            <span class="truncate">Data Petugas</span>
        </a>

        <!-- Data Kelas -->
        <a href="{{ route('datakelas.index') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('datakelas.*') 
                      ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400' 
                      : 'text-purple-200 hover:bg-purple-800/40 hover:text-white hover:translate-x-1' }}">
            <i class="fas fa-school w-5 text-center flex-shrink-0"></i>
            <span class="truncate">Data Kelas</span>
        </a>

        <!-- Data Wali Kelas -->
        <a href="{{ route('walikelas.index') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('walikelas.*') 
                      ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400' 
                      : 'text-purple-200 hover:bg-purple-800/40 hover:text-white hover:translate-x-1' }}">
            <i class="fas fa-chalkboard-teacher w-5 text-center flex-shrink-0"></i>
            <span class="truncate">Wali Kelas</span>
        </a>

        <!-- Data Siswa -->
        <a href="{{ route('datasiswa.index') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('datasiswa.*') 
                      ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400' 
                      : 'text-purple-200 hover:bg-purple-800/40 hover:text-white hover:translate-x-1' }}">
            <i class="fas fa-user-graduate w-5 text-center flex-shrink-0"></i>
            <span class="truncate">Data Siswa</span>
        </a>

        <!-- Divider -->
        <div class="pt-3 pb-2">
            <p class="px-4 text-xs font-semibold text-purple-300 uppercase tracking-wider opacity-70">Pengaturan</p>
        </div>

        <!-- Jenis Prestasi -->
        <a href="{{ route('jenisprestasi.index') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('jenisprestasi.*') 
                      ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400' 
                      : 'text-purple-200 hover:bg-purple-800/40 hover:text-white hover:translate-x-1' }}">
            <i class="fas fa-trophy w-5 text-center flex-shrink-0"></i>
            <span class="truncate">Jenis Prestasi</span>
        </a>

        <!-- Jenis Pelanggaran -->
        <a href="{{ route('jenispelanggaran.index') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200
                  {{ request()->routeIs('jenispelanggaran.*') 
                      ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400' 
                      : 'text-purple-200 hover:bg-purple-800/40 hover:text-white hover:translate-x-1' }}">
            <i class="fas fa-exclamation-triangle w-5 text-center flex-shrink-0"></i>
            <span class="truncate">Jenis Pelanggaran</span>
        </a>

        <!-- Input Prestasi -->
        <a href="{{ route('prestasi.index') }}"
        class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
        {{ request()->routeIs('prestasi.*')
                ? 'bg-purple-900 text-accent'
                : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
            <i class="fas fa-star w-5 text-center"></i>
            <span>Prestasi</span>
        </a>
        
        <!-- Input Pelanggarani -->
        <a href="{{ route('pelanggaran.index') }}"
        class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
        {{ request()->routeIs('pelanggaran.*')
                ? 'bg-purple-900 text-accent'
                : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
            <i class="fas fa-star w-5 text-center"></i>
            <span>Pelanggaran</span>
        </a>




    </nav>

    <!-- Logout Section -->
    <div class="p-4 border-t border-purple-700/50 flex-shrink-0">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-purple-200 hover:bg-purple-800/40 hover:text-white transition-all duration-200 group">
                <i class="fas fa-sign-out-alt w-5 text-center flex-shrink-0 group-hover:rotate-12 transition-transform"></i>
                <span class="truncate">Logout</span>
            </button>
        </form>
    </div>

</aside>

<style>
/* Custom Scrollbar Styling */
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    margin: 10px 0;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
    border-radius: 10px;
    transition: background 0.3s ease;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.2));
}

/* Firefox scrollbar */
.custom-scrollbar {
    scrollbar-width: thin;
    scrollbar-color: rgba(255, 255, 255, 0.2) transparent;
}

/* Menu Item Styling */
.sidebar-menu-item {
    position: relative;
    overflow: hidden;
}

.sidebar-menu-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s ease;
}

.sidebar-menu-item:hover::before {
    left: 100%;
}

/* Active menu indicator */
.sidebar-menu-item[style*="bg-gradient-to-r"]::after {
    content: '';
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 6px;
    height: 6px;
    background: #F2C94C;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(242, 201, 76, 0.5);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
        transform: translateY(-50%) scale(1);
    }
    50% {
        opacity: 0.7;
        transform: translateY(-50%) scale(1.2);
    }
}

/* Icon animation on hover */
.sidebar-menu-item:hover i {
    transform: scale(1.1);
    transition: transform 0.2s ease;
}
</style>