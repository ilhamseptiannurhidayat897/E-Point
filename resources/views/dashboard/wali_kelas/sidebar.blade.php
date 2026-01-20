<aside id="sidebar"
    class="fixed md:relative inset-y-0 left-0
           w-64 bg-gradient-to-b from-primary to-purple-900 text-white
           flex flex-col
           transform md:translate-x-0 -translate-x-full
           transition-all duration-300
           z-40 h-screen shadow-xl">

    {{-- LOGO --}}
    <div class="flex items-center gap-3 p-5">
        <div class="w-12 h-12 rounded-xl bg-white shadow-lg flex items-center justify-center">
            <img src="{{ asset('logo/smkn1kawali.jpg') }}"
                 class="w-10 h-10 rounded-lg object-cover">
        </div>
        <div>
            <h2 class="text-xl font-bold">E-Point</h2>
            <p class="text-xs text-purple-200">Wali Kelas</p>
        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1 custom-scrollbar">

        @php
            $menu = fn($route) =>
                request()->routeIs($route)
                ? 'bg-purple-800 text-white shadow-md'
                : 'text-purple-200 hover:bg-purple-800/40 hover:text-white';
        @endphp

        <a href="{{ route('wali_kelas.dashboard') }}"
           class="sidebar-item {{ $menu('dashboard.wali_kelas') }}">
            <i class="fas fa-home w-5 text-center"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('wali_kelas.profil') }}"
            class="sidebar-item {{ $menu('wali_kelas.profil*') }}">
            <i class="fas fa-user-graduate w-5 text-center"></i>
            <span>Profil</span>
        </a>
        
        <a href="{{ route('wali_kelas.siswa.index') }}"
           class="sidebar-item {{ $menu('wali_kelas.siswa') }}">
            <i class="fas fa-user-graduate w-5 text-center"></i>
            <span>Data Siswa</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="p-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                       text-purple-200 hover:bg-purple-800/40 hover:text-white transition">
                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                Logout
            </button>
        </form>
    </div>
</aside>

<style>
.sidebar-item{
    display:flex;
    align-items:center;
    gap:12px;
    padding:12px 16px;
    border-radius:12px;
    transition:all .2s ease;
}
.custom-scrollbar::-webkit-scrollbar{width:4px}
.custom-scrollbar::-webkit-scrollbar-thumb{
    background:rgba(255,255,255,.2);
    border-radius:10px
}
.custom-scrollbar{
    scrollbar-width:thin;
    scrollbar-color:rgba(255,255,255,.2) transparent
}
</style>
