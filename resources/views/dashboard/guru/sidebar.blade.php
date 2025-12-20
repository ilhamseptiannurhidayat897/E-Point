<!-- Sidebar -->
<aside id="sidebar"
    class="w-64 bg-primary text-white p-6 space-y-6 fixed md:relative transform md:translate-x-0 -translate-x-full transition-all duration-300 z-50 h-full overflow-y-auto shadow-xl">

    <div class="flex items-center space-x-3 pb-6 border-b border-purple-800">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-accent to-yellow-400 flex items-center justify-center">
            <img src="{{asset('logo/smkn1kawali.jpg')}}" alt="logo SMKN 1 Kawali">
        </div>
        <div>
            <h2 class="text-xl font-bold">E-Point</h2>
            <p class="text-xs text-purple-300">Dashboard Guru</p>
        </div>
    </div>

    <nav class="space-y-1">
        <a href="{{route('dashboard.guru.dashboard')}}" class="sidebar-item active flex items-center gap-3 px-4 py-3 rounded-lg bg-purple-900 text-accent font-medium">
            <i class="fas fa-home w-5 text-center"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{route('datasiswa.index')}}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
            <i class="fas fa-users w-5 text-center"></i>
            <span>Data Siswa</span>
        </a>
        <a href="/guru/pelanggaran" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
            <i class="fas fa-exclamation-triangle w-5 text-center"></i>
            <span>Data Pelanggaran</span>
        </a>
        <a href="/guru/kebaikan" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
            <i class="fas fa-star w-5 text-center"></i>
            <span>Data Kebaikan</span>
        </a>

        <a href="/guru/laporan" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
            <i class="fas fa-file-alt w-5 text-center"></i>
            <span>Laporan</span>
        </a>
        <a href="/guru/tatib" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
            <i class="fas fa-book w-5 text-center"></i>
            <span>Tata Tertib</span>
        </a>
        <a href="/guru/pengaturan" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
            <i class="fas fa-cog w-5 text-center"></i>
            <span>Pengaturan</span>
        </a>
    </nav>
    
   
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </button>
    </form>
</aside>