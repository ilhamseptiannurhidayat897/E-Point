    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 bg-primary text-white p-6 space-y-6 fixed md:relative transform md:translate-x-0 -translate-x-full transition-all duration-300 z-50 h-full overflow-y-auto shadow-xl">

            <div class="flex items-center space-x-3 pb-6 border-b border-purple-800">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-accent to-yellow-400 flex items-center justify-center">
                    <img src="smkn1kawali.jpg" alt="logo SMKN 1 Kawali">
                </div>
                <div>
                    <h2 class="text-xl font-bold">E-Point</h2>
                    <p class="text-xs text-purple-300">Sistem Informasi</p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('dashboard.guru') }}"
                class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
                {{ request()->routeIs('dashboard.guru') ? 'bg-purple-900 text-accent font-medium active' : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/kelas" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
                    <i class="fas fa-school w-5 text-center"></i>
                    <span>Data Kelas</span>
                </a>
                <a href="{{ route('datasiswa.index') }}"
                class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg
                {{ request()->routeIs('datasiswa.*') ? 'bg-purple-900 text-accent font-medium active' : 'text-purple-200 hover:bg-purple-900 hover:text-white' }}">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span>Data Siswa</span>
                </a>
                <a href="/laporan" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-900 transition-colors duration-200 text-purple-200 hover:text-white">
                    <i class="fas fa-file-alt w-5 text-center"></i>
                    <span>Laporan</span>
                </a>
            </nav>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Logout
                </button>
            </form>
        </aside>

        <!-- Overlay mobile -->
        <div id="overlay"
            class="hidden fixed inset-0 bg-black/50 md:hidden z-30"
            onclick="toggleSidebar()"></div>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Navbar -->
            <header class="w-full shadow-sm bg-white border-b border-gray-200 flex justify-between items-center px-6 py-4">
                <button onclick="toggleSidebar()" class="md:hidden text-primary text-xl">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="flex items-center space-x-4">
                    <h1 class="text-xl font-bold text-primary">Dashboard E-Point</h1>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-600 hover:text-primary focus:outline-none">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-accent rounded-full"></span>
                    </button>
                    <div class="flex items-center space-x-3 cursor-pointer">
                        <div class="relative">
                            <span class="w-2 h-2 bg-green-500 rounded-full absolute bottom-0 right-0 border-2 border-white"></span>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-purple-800 flex items-center justify-center text-white font-semibold">
                                YA
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-medium text-gray-800">Yesaya Abraham</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>