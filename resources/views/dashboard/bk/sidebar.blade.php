<aside id="sidebar"
    class="fixed md:relative inset-y-0 left-0 w-64
           bg-gradient-to-b from-primary to-purple-900 text-white
           flex flex-col
           transform md:translate-x-0 -translate-x-full
           transition-transform duration-300 ease-in-out
           z-40 md:z-auto
           h-screen overflow-hidden
           shadow-2xl md:shadow-xl">

    <!-- Logo -->
    <div class="flex items-center gap-3 p-5 border-b border-purple-700/50">
        <div class="w-12 h-12 rounded-xl bg-white shadow-lg flex items-center justify-center">
            <img src="{{ asset('logo/smkn1kawali.jpg') }}" class="w-10 h-10 rounded-lg">
        </div>
        <div>
            <h2 class="text-xl font-bold">E-Point</h2>
            <p class="text-xs text-purple-200">Dashboard BK</p>
        </div>
    </div>

    <!-- Menu -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-2 custom-scrollbar">

        <!-- Dashboard -->
        <a href="{{ route('bk.dashboard') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
           {{ request()->routeIs('dashboard.bk')
                ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400'
                : 'text-purple-200 hover:bg-purple-800/40 hover:text-white' }}">
            <i class="fas fa-home w-5 text-center"></i>
            <span>Dashboard</span>
        </a>

        <!-- Divider -->
        <div class="pt-3 pb-2">
            <p class="px-4 text-xs font-semibold text-purple-300 uppercase tracking-wider opacity-70">
                Monitoring
            </p>
        </div>




        <!-- Data Siswa -->
        <a href="{{ route('bk.siswa.index') }}"
           class="sidebar-menu-item flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
           {{ request()->routeIs('siswa*')
                ? 'bg-gradient-to-r from-purple-700 to-purple-800 text-white shadow-lg border-l-4 border-yellow-400'
                : 'text-purple-200 hover:bg-purple-800/40 hover:text-white' }}">
            <i class="fas fa-user-graduate w-5 text-center"></i>
            <span>Data Siswa</span>
        </a>

    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-purple-700/50">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                           text-purple-200 hover:bg-purple-800/40 hover:text-white">
                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                <span>Logout</span>
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