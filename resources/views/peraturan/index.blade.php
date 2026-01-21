<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peraturan dan Tata Tertib Murid - E-Point</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        
        :root {
            /* Warna Primer (Ungu) */
            --primary: rgb(43, 27, 100);
            --primary-light: rgb(63, 47, 120);
            --primary-dark: rgb(33, 17, 80);
            --primary-opacity: rgba(43, 27, 100, 0.1);
            
            /* Warna Aksen & Lainnya */
            --accent: #fbbf24;
            --accent-light: #fcd34d;
            --danger: #dc2626;
            --danger-light: #ef4444;
            --warning: #d97706;
            --success: #059669;
            
            /* Skema Abu-abu */
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }
        
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        body {
            background-color: var(--gray-50);
            color: var(--gray-800);
            line-height: 1.6;
        }
        
        /* --- Komponen UI --- */
        .primary-color { color: var(--primary); }
        .primary-bg { background-color: var(--primary); }
        .primary-border { border-color: var(--primary); }
        .accent-bg { background-color: var(--accent); }
        .accent-color { color: var(--accent); }

        .section-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.08), 0 2px 4px -1px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            opacity: 0;
            transform: translateY(20px);
        }
        
        .section-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .section-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .section-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            padding: 1.5rem 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .section-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
        }
        
        .section-header h2 {
            font-weight: 700;
            font-size: 1.75rem;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .section-content {
            padding: 2rem;
        }
        
        /* --- Responsive Tables --- */
        .regulation-table {
            overflow-x: auto;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            -webkit-overflow-scrolling: touch;
        }
        
        .regulation-table table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        
        .regulation-table th {
            font-weight: 600;
            text-align: left;
            padding: 1rem;
            background-color: var(--gray-100);
            border-bottom: 2px solid var(--gray-200);
            font-size: 0.875rem;
            color: var(--gray-700);
        }
        
        .regulation-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-100);
            font-size: 0.875rem;
            vertical-align: top;
        }
        
        .regulation-table tr:last-child td {
            border-bottom: none;
        }
        
        .regulation-table tr:hover {
            background-color: var(--gray-50);
        }
        
        .category-header {
            font-weight: 600;
            background-color: var(--gray-100);
            border-left: 4px solid var(--primary);
        }
        
        .violation-table .category-header { border-left-color: var(--warning); background-color: #fef3c7; }
        .reward-table .category-header { border-left-color: var(--success); background-color: #d1fae5; }
        .sanction-table .category-header { border-left-color: var(--danger); background-color: #fee2e2; }
        
        .point-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2.5rem;
            height: 2.5rem;
            padding: 0 0.5rem;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 0.875rem;
        }
        .point-low { background-color: #dbeafe; color: #1e40af; }
        .point-medium { background-color: #fed7aa; color: #c2410c; }
        .point-high { background-color: #fecaca; color: #b91c1c; }
        .point-critical { background-color: #e5e7eb; color: #111827; }
        
        /* --- Info Boxes --- */
        .info-box {
            background-color: var(--gray-50);
            border-left: 4px solid var(--accent);
            padding: 1rem 1.5rem;
            border-radius: 0 8px 8px 0;
            margin: 1.5rem 0;
        }
        .danger-box { background-color: #fef2f2; border-left-color: var(--danger); }
        .warning-box { background-color: #fffbeb; border-left-color: var(--warning); }
        .success-box { background-color: #f0fdf4; border-left-color: var(--success); }
        
        /* --- Tabs --- */
        .tab-buttons {
            display: flex;
            border-bottom: 2px solid var(--gray-200);
            margin-bottom: 2rem;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        .tab-button {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: var(--gray-600);
            border-bottom: 3px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
            font-size: 0.875rem;
        }
        
        .tab-button:hover {
            color: var(--primary);
        }
        
        .tab-button.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* --- Lists --- */
        .regulation-list {
            list-style: none;
            padding: 0;
        }
        
        .regulation-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--gray-100);
            position: relative;
            padding-left: 2rem;
            font-size: 0.875rem;
        }
        
        .regulation-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 1.25rem;
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background-color: var(--accent);
        }
        
        .regulation-list li:last-child {
            border-bottom: none;
        }
        
        /* --- Responsive Adjustments --- */
        @media (max-width: 640px) {
            .section-header h2 { font-size: 1.5rem; }
            .section-content { padding: 1.5rem; }
            .regulation-table th, .regulation-table td { padding: 0.75rem; font-size: 0.8rem; }
            .point-badge { min-width: 2rem; height: 2rem; font-size: 0.75rem; }
        }

    </style>
</head>

<body class="bg-gray-50 text-gray-800 leading-relaxed">

<!-- Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div>
                        <img src="{{ asset('logo/logosmk.png') }}"
                            alt="logo SMKN 1 Kawali"
                            class="w-10 h-10 rounded-lg object-cover">
                    </div>
                <span class="text-xl font-bold primary-color hidden sm:block">E-Point</span>
                <span class="text-lg font-bold primary-color sm:hidden">E-Point</span>
            </div>
            <div class="flex gap-2">
                <!-- Tombol Cetak: Hanya muncul di layar 'sm' (640px) ke atas -->
                <button onclick="window.print()" class="text-sm bg-gray-100 hover:bg-gray-200 px-3 py-2 rounded-lg transition flex items-center hidden sm:flex">
                    <i class="fas fa-print mr-2"></i>
                    <span class="hidden md:inline">Cetak</span>
                </button>
                <!-- Tombol Kembali: Muncul di SEMUA ukuran layar, teks hanya di 'md' (768px) ke atas -->
                <a href="/" class="text-sm text-gray-600 hover:text-primary transition flex items-center px-3 py-2">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span class="hidden md:inline">Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
    <!-- Main Content Area -->
    <main>
        
        <!-- HEADER -->
        <div id="header-peraturan" class="section-card text-center">
            <div class="section-header">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold uppercase">
                    Peraturan dan Tata Tertib Murid
                </h1>
                <p class="mt-2 font-semibold text-lg opacity-90">SMK Negeri 1 Kawali</p>
                <p class="text-sm opacity-80">
                    Tahun Pelajaran 2024 / 2025
                </p>
            </div>
        </div>

        <!-- BAB III -->
        <section id="bab-iii" class="section-card">
            <div class="section-header">
                <h2>Hak dan Kewajiban Murid</h2>
            </div>
            <div class="section-content">
                <div class="tab-container">
                    <div class="tab-buttons">
                        <button class="tab-button active" onclick="openTab(event, 'hak-murid')">Hak Murid</button>
                        <button class="tab-button" onclick="openTab(event, 'kewajiban-murid')">Kewajiban Murid</button>
                    </div>
                    
                    <div id="hak-murid" class="tab-content active">
                        <h4 class="font-semibold text-lg mb-4">Pasal 1<br>Hak-Hak Murid</h4>
                        <ol class="list-decimal list-inside space-y-3">
                            <li class="pl-2">Murid berhak mendapatkan pendidikan, pengajaran dan bimbingan sesuai dengan ketentuan yang berlaku</li>
                            <li class="pl-2">Murid yang berprestasi dalam kegiatan OSN, LKS, O2SN dan FLS2N serta kegiatan yang mengharumkan nama sekolah mulai dari tingkat Kabupaten, Provinsi, nasional sampai dengan tingkat International mendapatkan penghargaan yang layak sesuai dengan aturan yang berlaku</li>
                            <li class="pl-2">Murid berhak mendapat perlakuan yang sama dan proporsional dalam mendapatkan pelayanan standar dari SMK Negeri 1 Kawali</li>
                        </ol>
                    </div>
                    
                    <div id="kewajiban-murid" class="tab-content">
                        <h4 class="font-semibold text-lg mb-4">Pasal 2<br>Kewajiban Murid</h4>
                        
                        <div class="info-box">
                            <h5 class="font-medium">Ayat 1: Pakaian Seragam</h5>
                            <p class="mt-2">Murid wajib mengenakan pakaian seragam sekolah dengan ketentuan sebagai berikut:</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <h6 class="font-semibold text-md mb-3 flex items-center">
                                    <span class="w-8 h-8 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mr-2 text-sm">1</span>
                                    Umum
                                </h6>
                                <ul class="regulation-list">
                                    <li>Sopan dan rapi sesuai dengan ketentuan yang berlaku</li>
                                    <li>Senin memakai baju putih - bawahan abu tua berdasi abu</li>
                                    <li>Selasa memakai baju batik sekolah-bawahan abu tua</li>
                                    <li>Rabu memakai seragam Pramuka</li>
                                    <li>Kamis menggunakan pakaian Adat</li>
                                    <li>Jumat memakai baju Busana Muslim</li>
                                    <li>Memakai badge OSIS dan identitas sekolah</li>
                                    <li>Memakai ikat pinggang berwarna hitam</li>
                                    <li>Memakai kaos kaki sesuai hari yang ditentukan</li>
                                    <li>Pakaian tidak terbuat dari kain yang tipis dan tembus pandang</li>
                                </ul>
                            </div>
                            
                            <div>
                                <h6 class="font-semibold text-md mb-3 flex items-center">
                                    <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mr-2 text-sm">2</span>
                                    Khusus Pria
                                </h6>
                                <ul class="regulation-list">
                                    <li>Celana tidak sobek, dibuka jahitannya, atau ditambal</li>
                                    <li>Tidak memakai perhiasan atau aksesoris</li>
                                    <li>Rambut ukuran 4 cm</li>
                                    <li>Tidak bertindik</li>
                                    <li>Rambut tidak dimodifikasi</li>
                                    <li>Rambut tidak dicukur habis</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <h6 class="font-semibold text-md mb-3 flex items-center">
                                    <span class="w-8 h-8 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center mr-2 text-sm">3</span>
                                    Khusus Wanita
                                </h6>
                                <ul class="regulation-list">
                                    <li>Pakaian/baju seragam dimasukan ke dalam rok</li>
                                    <li>Rok abu panjang sampai dengan mata kaki</li>
                                    <li>Memakai kerudung sesuai warna yang ditentukan</li>
                                    <li>Peserta didik muslimah wajib mengenakan pakaian khas muslimah</li>
                                    <li>Tidak memakai perhiasan yang mencolok dan berlebihan</li>
                                    <li>Lengan baju tidak dilipat atau digulung</li>
                                    <li>Rambut disisir rapi atau diikat</li>
                                    <li>Tidak diperbolehkan mewarnai rambut</li>
                                    <li>Tidak memakai make-up berlebihan ke sekolah</li>
                                </ul>
                            </div>
                            
                            <div>
                                <h6 class="font-semibold text-md mb-3 flex items-center">
                                    <span class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center mr-2 text-sm">4</span>
                                    Pakaian Khusus
                                </h6>
                                <div class="space-y-4">
                                    <div>
                                        <h6 class="font-medium">Pakaian Olahraga</h6>
                                        <ul class="regulation-list mt-2">
                                            <li>Wajib mengenakan pakaian olahraga yang ditetapkan</li>
                                            <li>Menggunakan kerudung yang menutupi dada (khusus Wanita)</li>
                                            <li>Diperbolehkan menggunakan sepatu olahraga</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h6 class="font-medium">Pakaian Praktik</h6>
                                        <ul class="regulation-list mt-2">
                                            <li>Wajib dikenakan pada saat jam pelajaran praktik</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h6 class="font-medium">Pakaian Organisasi</h6>
                                        <ul class="regulation-list mt-2">
                                            <li>Hanya digunakan pada saat kegiatan organisasi</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <h5 class="font-semibold text-lg mb-4">Pasal 3<br>Rambut, Kuku, Tato, Make Up</h5>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="info-box">
                                    <h6 class="font-medium">Umum</h6>
                                    <p class="mt-2">Murid dilarang:</p>
                                    <ul class="regulation-list mt-2">
                                        <li>Berkuku panjang, bertato</li>
                                        <li>Mengecat rambut dan kuku</li>
                                        <li>Alis tidak boleh dicukur habis</li>
                                    </ul>
                                </div>
                                <div class="info-box">
                                    <h6 class="font-medium">Khusus Pria</h6>
                                    <ul class="regulation-list mt-2">
                                        <li>Rambut ukuran 4 cm</li>
                                        <li>Tidak bertindik</li>
                                        <li>Rambut tidak dimodifikasi</li>
                                        <li>Rambut tidak dicukur habis</li>
                                    </ul>
                                </div>
                                <div class="info-box">
                                    <h6 class="font-medium">Khusus Wanita</h6>
                                    <ul class="regulation-list mt-2">
                                        <li>Rambut disisir rapi atau diikat</li>
                                        <li>Tidak diperbolehkan mewarnai rambut</li>
                                        <li>Tidak memakai make-up berlebihan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <h5 class="font-semibold text-lg mb-4">Pasal 4<br>Masuk, Proses KBM, dan Pulang Sekolah</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h6 class="font-medium mb-3">Kehadiran</h6>
                                    <ul class="regulation-list">
                                        <li>Wajib hadir selambat-lambatnya pukul 06.20 WIB</li>
                                        <li>Wajib melakukan absensi check in pada aplikasi</li>
                                        <li>Terlambat melapor kepada guru mapel/piket</li>
                                        <li>Sakit/izin membuat surat keterangan</li>
                                    </ul>
                                </div>
                                <div>
                                    <h6 class="font-medium mb-3">Selama KBM</h6>
                                    <ul class="regulation-list">
                                        <li>Tidak menggunakan alat komunikasi yang tidak berkaitan</li>
                                        <li>Dilarang berada di luar kelas tanpa izin</li>
                                        <li>Praktikum harus di tempat/ruang praktik</li>
                                        <li>Pukul 10.00 WIB wajib berhenti untuk membacakan Pancasila</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <h5 class="font-semibold text-lg mb-4">Pasal 5<br>Kebersihan, Kedisiplinan, Ketertiban dan Sopan Santun</h5>
                            <div class="space-y-6">
                                <div class="info-box">
                                    <h6 class="font-semibold text-md mb-3 flex items-center">
                                        <i class="fas fa-chalkboard-teacher text-purple-500 mr-2"></i>
                                        Lingkungan Kelas
                                    </h6>
                                    <ul class="regulation-list">
                                        <li>Setiap kelas membentuk tim piket kelas yang secara bergiliran bertugas menjaga kebersihan, dan ketertiban, serta memelihara perlengkapan kelas</li>
                                        <li>Tim piket kelas mempunyai tugas sebagai berikut:
                                            <ul class="list-circle list-inside mt-2 ml-4 space-y-1">
                                                <li>Membersihkan papan tulis setiap pergantian pelajaran</li>
                                                <li>Membantu menyiapkan dan membereskan perlengkapan KBM</li>
                                                <li>Membersihkan kelas serta merapikan bangku-bangku dan meja setelah KBM berakhir</li>
                                                <li>Merapikan hiasan dinding kelas, seperti struktur organisasi kelas, jadwal piket, papan absensi dan hiasan lainnya</li>
                                                <li>Melaporkan kepada guru piket tentang tindakan-tindakan pelanggaran di kelas yang menyangkut kebersihan dan ketertiban kelas, misalnya mengotori atau merusak sarana yang ada di kelas</li>
                                            </ul>
                                        </li>
                                        <li>Sebelum pulang seluruh murid melakukan doa bersama serta mengucapkan terima kasih kepada guru</li>
                                    </ul>
                                </div>

                                <div class="info-box">
                                    <h6 class="font-semibold text-md mb-3 flex items-center">
                                        <i class="fas fa-school text-green-500 mr-2"></i>
                                        Lingkungan Sekolah
                                    </h6>
                                    <ul class="regulation-list">
                                        <li>Setiap murid menjaga kebersihan kamar kecil/toilet, dan seluruh lingkungan sekolah lainnya</li>
                                        <li>Setiap murid membuang sampah pada tempatnya</li>
                                        <li>Setiap murid membiasakan budaya antre dalam mengikuti berbagai kegiatan sekolah yang berlangsung pada waktu bersamaan</li>
                                        <li>Setiap murid menjaga suasana ketenangan belajar, baik di kelas, di perpustakaan, di laboratorium, dan tempat praktik maupun di tempat lain di lingkungan sekolah</li>
                                        <li>Setiap murid menaati peraturan yang berlaku di perpustakaan, penggunaan laboratorium, tempat praktik dan tempat belajar lainnya</li>
                                        <li>Setiap murid wajib mengikuti satu kegiatan ekstrakurikuler dan hanya diperkenankan mengikuti maksimal dua kegiatan ekstrakurikuler dan satu organisasi</li>
                                    </ul>
                                </div>

                                <div class="info-box">
                                    <h6 class="font-semibold text-md mb-3 flex items-center">
                                        <i class="fas fa-flag text-red-500 mr-2"></i>
                                        Upacara Bendera
                                    </h6>
                                    <ul class="regulation-list">
                                        <li>Semua murid wajib mengikuti upacara bendera hari Senin, kecuali yang mendapat dispensasi/ijin dari guru piket</li>
                                        <li>Memakai topi saat upacara bendera dengan topi yang sudah ditentukan oleh sekolah kecuali ada rekomendasi dari kepala sekolah dan atau guru yang diberi wewenang untuk menentukan topi lain</li>
                                        <li>Pada hari pelaksanaan upacara, murid wajib mengenakan seragam sesuai dengan jadwal seragam yang telah ditentukan</li>
                                    </ul>
                                </div>

                                <div class="info-box">
                                    <h6 class="font-semibold text-md mb-3 flex items-center">
                                        <i class="fas fa-handshake text-purple-500 mr-2"></i>
                                        Sopan Santun dan Hubungan Kekeluargaan
                                    </h6>
                                    <ul class="regulation-list">
                                        <li>Setiap murid wajib bersikap sopan baik di sekolah maupun di luar sekolah</li>
                                        <li>Murid wajib menunjukkan tingkah laku sopan dan hormat kepada siapapun: Orang tua, Bapak/Ibu guru atau pendidik, karyawan, penjual di kantin, tamu dan sesama murid. Misalnya: memberi salam/tanda hormat kepada guru sewaktu bertemu/berpisah, memberi jalan kepada orang yang mau lewat, duduk pada kursi (bukan meja) dan lain sebagainya</li>
                                        <li>Kesempatan jajan di kantin hanya pada saat sebelum/sesudah jam sekolah, waktu jam istirahat, dan sesudah pelajaran Olah Raga untuk yang bersangkutan</li>
                                        <li>Para murid diwajibkan menjaga dan melaksanakan Kebersihan, Ketertiban, Keamanan, Kesehatan, Kekeluargaan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BAB VI - Larangan -->
        <section id="bab-vi" class="section-card">
            <div class="section-header">
                <h2>Larangan</h2>
            </div>
            <div class="section-content">
                <div class="danger-box">
                    <p class="font-semibold text-lg mb-2">Murid-murid selama Jam Kegiatan Belajar Mengajar (KBM), dilarang:</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <h6 class="font-semibold text-md mb-3 flex items-center">
                            <i class="fas fa-ban text-red-500 mr-2"></i>
                            Larangan Umum
                        </h6>
                        <ul class="regulation-list">
                            <li>Membawa buku bacaan yang tidak sopan atau porno</li>
                            <li>Membawa alat elektronik yang tidak berkaitan dengan pelajaran</li>
                            <li>Merokok di lingkungan dan sekitar sekolah</li>
                            <li>Membawa atau menggunakan obat terlarang/minuman keras</li>
                            <li>Melakukan tawuran terhadap sesama murid</li>
                            <li>Melakukan praktik perjudian dan main kartu</li>
                            <li>Melakukan perbuatan asusila</li>
                            <li>Memakai pakaian yang "compang-camping"</li>
                            <li>Memakai perhiasan yang berlebihan</li>
                            <li>Memakai make up, lipstik, cat kuku berlebihan</li>
                            <li>Membawa senjata tajam atau bahan peledak</li>
                            <li>Mencuri atau merugikan orang lain</li>
                            <li>Berkelahi/menghasut/mengintimidasi</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h6 class="font-semibold text-md mb-3 flex items-center">
                            <i class="fas fa-exclamation-triangle text-orange-500 mr-2"></i>
                            Larangan Khusus
                        </h6>
                        <ul class="regulation-list">
                            <li>Menerima tamu saat jam belajar tanpa izin</li>
                            <li>Berolah raga saat jam belajar (kecuali pelajaran olah raga)</li>
                            <li>Memakai sendal atau sepatu diinjak pada bagian belakangnya</li>
                            <li>Berada di kantin saat jam belajar</li>
                            <li>Mencoret-coret peralatan pembelajaran</li>
                            <li>Berkerumun di luar lingkungan sekolah</li>
                            <li>Membuang sampah sembarangan</li>
                            <li>Membentuk organisasi tanpa seizin kepala sekolah</li>
                            <li>Memalsukan dokumen</li>
                            <li>Mengikuti organisasi/LSM diluar sekolah (yang tidak baik)</li>
                            <li>Menjalin hubungan yang berlebihan di sekolah</li>
                            <li>Menjalin hubungan dengan sesama jenis (LGBT)</li>
                            <li>Melakukan pergaulan bebas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- BAB VII - Sanksi -->
        <section id="bab-vii" class="section-card">
            <div class="section-header">
                <h2>Sanksi-Sanksi dan Penghargaan</h2>
            </div>
            <div class="section-content">
                <div class="tab-container">
                    <div class="tab-buttons">
                        <button class="tab-button active" onclick="openTab(event, 'sanksi-poin')">Sanksi Poin</button>
                        <button class="tab-button" onclick="openTab(event, 'penghargaan-poin')">Penghargaan Poin</button>
                        <button class="tab-button" onclick="openTab(event, 'bentuk-sanksi')">Bentuk Sanksi</button>
                    </div>
                    
                    <div id="sanksi-poin" class="tab-content active">
                        <h4 class="font-semibold text-lg mb-4">Ayat 1: Sanksi Poin Negatif</h4>
                        <p class="mb-4">Dalam sanksi dipergunakan sistem poin, dengan istilah point negatif, yaitu:</p>
                        
                        <div class="regulation-table violation-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Kategori Pelanggaran</th>
                                        <th class="text-center">Jumlah Poin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="category-header"><td colspan="2">Pakaian / Seragam (P)</td></tr>
                                    <tr><td>Senin tidak berpakaian PSAS (Putih-Abu) lengkap</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Selasa tidak berpakaian Batik (Batik-Abu)</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Rabu tidak berpakaian pramuka lengkap</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Kamis tidak menggunakan pakaian adat</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Jum'at tidak menggunakan pakaian busana muslim</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Tidak bersepatu hitam/kaos kaki sesuai hari</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Berpakaian ketat atau tidak rapi</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Rambut (R)</td></tr>
                                    <tr><td>Model rambut tidak sesuai ketentuan</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Model rambut Dimodifikasi</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Dicat selain warna hitam</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Tidak tertutupi kerudung (Khusus Perempuan)</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Aksesoris (A)</td></tr>
                                    <tr><td>Memakai cat/pacar kuku</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Make Up berlebihan</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Laki-laki memakai perhiasan</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Perempuan memakai perhiasan berlebihan</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Berkuku panjang</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Kehadiran (K)</td></tr>
                                    <tr><td>Terlambat masuk pintu gerbang >5 menit</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Terlambat masuk kelas > 10 menit</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Bolos/Kabur/Pilih pelajaran</td><td class="text-center"><span class="point-badge point-medium">10</span></td></tr>
                                    <tr><td>Alpa</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Surat Palsu</td><td class="text-center"><span class="point-badge point-medium">10</span></td></tr>
                                    <tr><td>Keluar kelas/lingkungan sekolah tanpa izin</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Tidak mengikuti upacara bendera</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Tidak mengikuti kegiatan sekolah</td><td class="text-center"><span class="point-badge point-medium">15</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Kebersihan (Kb)</td></tr>
                                    <tr><td>Tidak melaksanakan tugas piket kelas</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Membuang sampah tidak pada tempatnya</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Mencoret-coret sarana dan prasarana sekolah</td><td class="text-center"><span class="point-badge point-medium">10</span></td></tr>
                                    <tr><td>Menggunakan WC kepala sekolah, guru dan karyawan</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Merusak tanaman lingkungan sekolah</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Makan dan minum di dalam kelas/ruang praktek</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Merusak / menghilangkan sarana sekolah</td><td class="text-center"><span class="point-badge point-high">25</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Tingkah Laku (TL)</td></tr>
                                    <tr><td>Keluar /masuk ruangan melewati jendela</td><td class="text-center"><span class="point-badge point-medium">10</span></td></tr>
                                    <tr><td>Berkata tidak sopan</td><td class="text-center"><span class="point-badge point-low">5</span></td></tr>
                                    <tr><td>Memanggil nama buruk yang bukan namanya</td><td class="text-center"><span class="point-badge point-low">5</span></td></tr>
                                    <tr><td>Menggunakan HP selama KBM</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Membawa alat musik (walkman, radio, ipod)</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Menyontek saat ulangan</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Tidak mengerjakan tugas dari guru</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Mengganggu KBM</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Tidak membawa peralatan belajar</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Tidur di kelas</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Susila (S)</td></tr>
                                    <tr><td>Menyalahgunakan barang cetakan/elektronik porno</td><td class="text-center"><span class="point-badge point-high">30</span></td></tr>
                                    <tr><td>Membawa atau merokok di lingkungan sekolah</td><td class="text-center"><span class="point-badge point-high">30</span></td></tr>
                                    <tr><td>Berpacaran di sekolah</td><td class="text-center"><span class="point-badge point-high">25</span></td></tr>
                                    <tr><td>Anggota badan bertato dan bertindik (pria)</td><td class="text-center"><span class="point-badge point-high">30</span></td></tr>
                                    <tr><td>Berprilaku buruk terhadap kepala sekolah</td><td class="text-center"><span class="point-badge point-high">50</span></td></tr>
                                    <tr><td>Membawa alat kontrasepsi</td><td class="text-center"><span class="point-badge point-high">50</span></td></tr>
                                    <tr><td>Bermain judi /kartu di Sekolah</td><td class="text-center"><span class="point-badge point-high">50</span></td></tr>
                                    <tr><td>Berbohong, memfitnah, menuduh, mengancam</td><td class="text-center"><span class="point-badge point-high">50</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Pelanggaran Berat (PB)</td></tr>
                                    <tr><td>Membawa senjata tajam tanpa izin</td><td class="text-center"><span class="point-badge point-high">75</span></td></tr>
                                    <tr><td>Menganiaya / Berkelahi</td><td class="text-center"><span class="point-badge point-high">75</span></td></tr>
                                    <tr><td>Mengikuti organisasi/LSM diluar sekolah</td><td class="text-center"><span class="point-badge point-critical">100</span></td></tr>
                                    <tr><td>Menjalin hubungan dengan sesama jenis (LGBT)</td><td class="text-center"><span class="point-badge point-critical">100</span></td></tr>
                                    <tr><td>Tawuran</td><td class="text-center"><span class="point-badge point-critical">100</span></td></tr>
                                    <tr><td>Mengganti/memalsukan dokumen</td><td class="text-center"><span class="point-badge point-critical">100</span></td></tr>
                                    <tr><td>Mencuri/menipu / Pemerasan</td><td class="text-center"><span class="point-badge point-critical">100</span></td></tr>
                                    <tr><td>Melawan secara fisik terhadap kepala sekolah</td><td class="text-center"><span class="point-badge point-critical">200</span></td></tr>
                                    <tr><td>Membawa/menggunakan/mengedarkan NARKOBA</td><td class="text-center"><span class="point-badge point-critical">200</span></td></tr>
                                    <tr><td>Membawa/menggunakan/mengedarkan MIRAS</td><td class="text-center"><span class="point-badge point-critical">200</span></td></tr>
                                    <tr><td>Hamil /menghamili / Menikah</td><td class="text-center"><span class="point-badge point-critical">200</span></td></tr>
                                    <tr><td>Pelecehan seksual / Sex bebas / Memperkosa</td><td class="text-center"><span class="point-badge point-critical">200</span></td></tr>
                                    <tr><td>Terbukti terlibat geng motor</td><td class="text-center"><span class="point-badge point-critical">200</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div id="penghargaan-poin" class="tab-content">
                        <h4 class="font-semibold text-lg mb-4">Ayat 2: Penghargaan Poin Positif</h4>
                        <div class="regulation-table reward-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Kategori Prestasi</th>
                                        <th class="text-center">Jumlah Poin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="category-header"><td colspan="2">Prestasi Lomba</td></tr>
                                    <tr><td>Tingkat Kelas: Juara I</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Tingkat Kelas: Juara II</td><td class="text-center"><span class="point-badge point-low">3</span></td></tr>
                                    <tr><td>Tingkat Kelas: Juara III</td><td class="text-center"><span class="point-badge point-low">2</span></td></tr>
                                    <tr><td>Tingkat Sekolah/Kecamatan: Juara I</td><td class="text-center"><span class="point-badge point-low">6</span></td></tr>
                                    <tr><td>Tingkat Sekolah/Kecamatan: Juara II</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Tingkat Sekolah/Kecamatan: Juara III</td><td class="text-center"><span class="point-badge point-low">3</span></td></tr>
                                    <tr><td>Tingkat Kabupaten: Juara I</td><td class="text-center"><span class="point-badge point-medium">8</span></td></tr>
                                    <tr><td>Tingkat Kabupaten: Juara II</td><td class="text-center"><span class="point-badge point-low">6</span></td></tr>
                                    <tr><td>Tingkat Kabupaten: Juara III</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Tingkat Wilayah: Juara I</td><td class="text-center"><span class="point-badge point-medium">10</span></td></tr>
                                    <tr><td>Tingkat Wilayah: Juara II</td><td class="text-center"><span class="point-badge point-low">8</span></td></tr>
                                    <tr><td>Tingkat Wilayah: Juara III</td><td class="text-center"><span class="point-badge point-low">6</span></td></tr>
                                    <tr><td>Tingkat Propinsi: Juara I</td><td class="text-center"><span class="point-badge point-medium">12</span></td></tr>
                                    <tr><td>Tingkat Propinsi: Juara II</td><td class="text-center"><span class="point-badge point-medium">10</span></td></tr>
                                    <tr><td>Tingkat Propinsi: Juara III</td><td class="text-center"><span class="point-badge point-low">8</span></td></tr>
                                    <tr><td>Tingkat Nasional: Juara I</td><td class="text-center"><span class="point-badge point-high">40</span></td></tr>
                                    <tr><td>Tingkat Nasional: Juara II</td><td class="text-center"><span class="point-badge point-high">30</span></td></tr>
                                    <tr><td>Tingkat Nasional: Juara III</td><td class="text-center"><span class="point-badge point-medium">20</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Prestasi Keagamaan</td></tr>
                                    <tr><td>Tahfid Surat-surat Al-Qur'an: 5 surat</td><td class="text-center"><span class="point-badge point-low">2</span></td></tr>
                                    <tr><td>Tahfid Surat-surat Al-Qur'an: 10 surat</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Tahfid Surat-surat Al-Qur'an: 15 surat</td><td class="text-center"><span class="point-badge point-low">6</span></td></tr>
                                    <tr><td>Tahfid Surat-surat Al-Qur'an: 20 surat</td><td class="text-center"><span class="point-badge point-low">8</span></td></tr>
                                    <tr><td>Tahfid Surat-surat Al-Qur'an: > 20 surat</td><td class="text-center"><span class="point-badge point-medium">20</span></td></tr>
                                    <tr><td>Tahfidz Qur'an / Juz</td><td class="text-center"><span class="point-badge point-high">40</span></td></tr>
                                    <tr><td>Membaca Surat – surat Al-Qur'an: 10 surat</td><td class="text-center"><span class="point-badge point-low">2</span></td></tr>
                                    <tr><td>Membaca Surat – surat Al-Qur'an: 14 surat</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Membaca Surat – surat Al-Qur'an: 16 surat</td><td class="text-center"><span class="point-badge point-low">6</span></td></tr>
                                    <tr><td>Membaca Surat – surat Al-Qur'an: 18 surat</td><td class="text-center"><span class="point-badge point-low">8</span></td></tr>
                                    <tr><td>Membaca Surat – surat Al-Qur'an: ≥ 20 surat</td><td class="text-center"><span class="point-badge point-medium">15</span></td></tr>
                                    <tr><td>Qur'an /Juz</td><td class="text-center"><span class="point-badge point-medium">30</span></td></tr>
                                    <tr class="category-header"><td colspan="2">Prestasi Organisasi</td></tr>
                                    <tr><td>Pengurus inti kelas /semester</td><td class="text-center"><span class="point-badge point-low">2</span></td></tr>
                                    <tr><td>Anggota MPK/semester</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Pengurus inti MPK/semester</td><td class="text-center"><span class="point-badge point-low">6</span></td></tr>
                                    <tr><td>Anggota pengurus OSIS/semester</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Pengurus inti OSIS/semester</td><td class="text-center"><span class="point-badge point-low">6</span></td></tr>
                                    <tr><td>Pengurus organisasi otonomi: Tingkat Kecamatan</td><td class="text-center"><span class="point-badge point-low">4</span></td></tr>
                                    <tr><td>Pengurus organisasi otonomi: Tingkat Kabupaten</td><td class="text-center"><span class="point-badge point-low">6</span></td></tr>
                                    <tr><td>Pengurus organisasi otonomi: Tingkat Wilayah</td><td class="text-center"><span class="point-badge point-low">8</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div id="bentuk-sanksi" class="tab-content">
                        <h4 class="font-semibold text-lg mb-4">Pasal 7: Bentuk-Bentuk Sanksi</h4>
                        <p class="mb-4">Bentuk sanksi pelanggaran berdasarkan akumulasi point negatif sebagai berikut:</p>
                        
                        <div class="regulation-table sanction-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Jumlah Poin</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td class="text-center">1</td><td class="text-center"><span class="point-badge point-low">≥12</span></td><td>Teguran lisan</td></tr>
                                    <tr><td class="text-center">2</td><td class="text-center"><span class="point-badge point-low">≥18</span></td><td>Peringatan tertulis</td></tr>
                                    <tr><td class="text-center">3</td><td class="text-center"><span class="point-badge point-low">≥22</span></td><td>Peringatan tertulis disampaikan kepada orang tua</td></tr>
                                    <tr><td class="text-center">4</td><td class="text-center"><span class="point-badge point-medium">≥50</span></td><td>Pemanggilan orang tua</td></tr>
                                    <tr><td class="text-center">5</td><td class="text-center"><span class="point-badge point-medium">≥75</span></td><td>Murid dan orang tua membuat surat perjanjian bermaterai</td></tr>
                                    <tr><td class="text-center">6</td><td class="text-center"><span class="point-badge point-high">≥100</span></td><td>Murid diskor selama tiga hari</td></tr>
                                    <tr><td class="text-center">7</td><td class="text-center"><span class="point-badge point-high">≥135</span></td><td>Murid diskor selama enam hari</td></tr>
                                    <tr><td class="text-center">8</td><td class="text-center"><span class="point-badge point-high">≥175</span></td><td>Murid diminta pindah sekolah</td></tr>
                                    <tr><td class="text-center">9</td><td class="text-center"><span class="point-badge point-critical">≥200</span></td><td>Murid dikembalikan kepada orang tua</td></tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                            <div class="warning-box">
                                <h5 class="font-semibold text-md mb-3">Khusus Keterlambatan:</h5>
                                <ol class="list-decimal list-inside space-y-2">
                                    <li>2 kali: peringatan dan pembinaan oleh wali kelas dan guru BK</li>
                                    <li>3 kali: diundang orang tuanya, membuat perjanjian tertulis</li>
                                    <li>5 kali: peringatan keras oleh wali kelas dan wakil kemuridan</li>
                                    <li>6 kali: orang tua diundang, murid diberikan skorsing 1 hari</li>
                                    <li>9 kali: orang tua diundang, murid diberikan skorsing 3 hari</li>
                                    <li>10 kali: dilaksanakan konferensi kasus</li>
                                </ol>
                            </div>
                            
                            <div class="warning-box">
                                <h5 class="font-semibold text-md mb-3">Khusus Kehadiran (Alpa):</h5>
                                <ol class="list-decimal list-inside space-y-2">
                                    <li>3 kali: orang tua diundang dan murid diberikan pembinaan khusus</li>
                                    <li>4 kali: orang tua diundang, murid diberikan skorsing 1 hari</li>
                                    <li>5 kali: orang tua diundang, murid diberikan skors 2 hari</li>
                                    <li>6 kali: diadakan konferensi kasus</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="success-box mt-6">
                            <h5 class="font-semibold text-md mb-3">Ketentuan Pelanggaran:</h5>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Pelanggaran akan diproses dengan tahapan: dinasehati, dibina, mengundang orang tua, konferensi kasus</li>
                                <li>Pelanggaran di luar lingkungan sekolah akan diproses berdasarkan ketentuan sekolah</li>
                                <li>Pelanggaran hukum/tindakan pidana akan diserahkan kepada pihak yang berwenang</li>
                            </ul>
                        </div>
                        
                        <div class="info-box mt-6">
                            <h5 class="font-semibold text-md mb-3">Ketentuan Poin dan Skorsing:</h5>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Poin berlaku untuk satu tahun pelajaran</li>
                                <li>Poin positif berfungsi untuk mengurangi/menghapus poin negatif</li>
                                <li>Murid yang diskors wajib menandatangani daftar hadir khusus, melaksanakan tugas, dan belajar di perpustakaan</li>
                                <li>Tata tertib ini berlaku di lingkungan sekolah dan pada waktu sekolah</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    </main>
</div>

<!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div>
                        <img src="{{ asset('logo/logosmk.png') }}"
                            alt="logo SMKN 1 Kawali"
                            class="w-10 h-10 rounded-lg object-cover">
                    </div>  
                        <span class="text-xl font-bold">E-Point</span>
                    </div>
                    <p class="text-gray-400 mb-4 max-w-md">Sistem informasi poin siswa terintegrasi untuk membantu sekolah dalam mengelola kebaikan dan pelanggaran siswa dengan mudah dan transparan.</p>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/smkn1kawali/?locale=id_ID" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/smkn1kawali/?hl=en" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/smkn1kawali/?originalSubdomain=id" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white">Beranda</a></li>
                        <li><a href="#features" class="text-gray-400 hover:text-white">Fitur</a></li>
                        <li><a href="#how-it-works" class="text-gray-400 hover:text-white">Cara Kerja</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-accent"></i>
                            <span class="text-gray-400">Jl.Talagasari, No.35 Kawalimukti, Kawali Kabupaten Ciamis Jawa Barat 46252</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2 text-accent"></i>
                            <span class="text-gray-400">(0265) 791 727-Central Office</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-accent"></i>
                            <span class="text-gray-400">smkn1kawali@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 E-Point. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

<!-- Scroll to top button -->
<button id="scrollToTop" class="fixed bottom-8 right-8 primary-bg text-white p-3 rounded-full shadow-lg hidden hover:opacity-90 transition z-40">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- Scroll to Top ---
    const scrollToTopBtn = document.getElementById('scrollToTop');
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    });
    scrollToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

    // --- Tab Functionality ---
    window.openTab = function(evt, tabName) {
        document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
        document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
        document.getElementById(tabName).classList.add('active');
        evt.currentTarget.classList.add('active');
    };

    // --- Fade-in Animation on Scroll ---
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.section-card').forEach(card => {
        observer.observe(card);
    });

});
</script>

</body>
</html>