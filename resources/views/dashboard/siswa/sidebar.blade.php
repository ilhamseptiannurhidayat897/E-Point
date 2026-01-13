<aside id="sidebar"
    class="fixed md:relative inset-y-0 left-0
           w-64 bg-gradient-to-b from-primary to-purple-900 text-white
           flex flex-col
           transform md:translate-x-0 -translate-x-full
           transition-all duration-300
           z-40 h-screen shadow-xl">

    {{-- LOGO --}}
    <div class="flex items-center gap-3 p-5">
        <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center">
            <img src="{{ asset('logo/smkn1kawali.jpg') }}"
                 class="w-10 h-10 rounded-lg object-cover">
        </div>
        <div>
            <h2 class="text-xl font-bold">E-Point</h2>
            <p class="text-xs text-purple-200">Siswa</p>
        </div>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 p-4 space-y-2">

        @php
            $active = 'bg-purple-800 text-white';
            $normal = 'text-purple-200 hover:bg-purple-800/40 hover:text-white';
        @endphp

        <a href="{{ route('dashboard.siswa') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           {{ request()->routeIs('dashboard.siswa') ? $active : $normal }}">
            <i class="fas fa-home w-5 text-center"></i>
            Dashboard
        </a>

        <a href="{{ route('siswa.profil') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl
        {{ request()->routeIs('siswa.profil*') ? $active : $normal }}">
            <i class="fas fa-user w-5 text-center"></i>
            Profil
        </a>

        <a href="{{ route('prestasi') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl
        {{ request()->routeIs('prestasi*') ? $active : $normal }}">
            <i class="fas fa-user w-5 text-center"></i>
            Prestasi
        </a>
        
        <a href="{{ route('pelanggaran') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl
        {{ request()->routeIs('pelanggaran*') ? $active : $normal }}">
            <i class="fas fa-user w-5 text-center"></i>
            Pelanggaran
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="p-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl
                       text-purple-200 hover:bg-purple-800/40 hover:text-white">
                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                Logout
            </button>
        </form>
    </div>
</aside>
