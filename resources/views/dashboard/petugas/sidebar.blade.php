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
        <a href="{{ route('dashboard.petugas') }}"
           class="sidebar-item active flex items-center gap-3 px-4 py-3 rounded-lg bg-purple-900 text-accent font-medium">
            <i class="fas fa-home w-5 text-center"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('kebaikan.index') }}"
           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 text-purple-200 hover:text-white">
            <i class="fas fa-star w-5 text-center"></i>
            <span>Kebaikan</span>
        </a>

        <a href="{{ route('pelanggaran.index') }}"
           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 text-purple-200 hover:text-white">
            <i class="fas fa-exclamation-triangle w-5 text-center"></i>
            <span>Pelanggaran</span>
        </a>

        <a href="{{ route('inputkebaikan.create') }}"
           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 text-purple-200 hover:text-white">
            <i class="fas fa-exclamation-triangle w-5 text-center"></i>
            <span>Input Kebaikan</span>
        </a>

        <a href="{{ route('inputpelanggaran.create') }}"
           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 text-purple-200 hover:text-white">
            <i class="fas fa-exclamation-triangle w-5 text-center"></i>
            <span>Input pelanggaran</span>
        </a>

        <a href="/kelas"
           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 text-purple-200 hover:text-white">
            <i class="fas fa-school w-5 text-center"></i>
            <span>Data Kelas</span>
        </a>

        <a href="/siswa"
           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 text-purple-200 hover:text-white">
            <i class="fas fa-users w-5 text-center"></i>
            <span>Data Siswa</span>
        </a>

        <a href="/laporan"
           class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 text-purple-200 hover:text-white">
            <i class="fas fa-file-alt w-5 text-center"></i>
            <span>Laporan</span>
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
