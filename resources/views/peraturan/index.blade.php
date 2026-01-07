<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peraturan dan Tata Tertib Murid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .primary-color {
            color: #0f4c81;
        }
        .accent-color {
            background-color: #fbbf24;
        }
        .danger-color {
            color: #dc2626;
        }
        .warning-color {
            color: #d97706;
        }
        .scroll-to-top {
            transition: all 0.3s ease;
        }
        .regulation-table {
            overflow-x: auto;
        }
        .regulation-table table {
            min-width: 100%;
        }
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 leading-relaxed">

<!-- Navbar -->
<nav class="bg-white shadow sticky top-0 z-50 no-print">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
                    <div>
                        <img src="{{ asset('logo/logosmk.png') }}"
                            alt="logo SMKN 1 Kawali"
                            class="w-10 h-10 rounded-lg object-cover">
                    </div>
                    <span class="text-xl font-bold text-primary">SMK Negeri 1 Kawali</span>
        </div>
        <div class="flex gap-3">
            <button onclick="window.print()" class="text-sm bg-slate-100 hover:bg-slate-200 px-3 py-1 rounded transition">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                Cetak
            </button>
            <a href="/" class="text-sm text-gray-600 hover:text-primary transition flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</nav>

<div class="max-w-6xl mx-auto px-4 py-8">

    <!-- HEADER -->
    <div class="text-center mb-10 bg-white rounded-xl shadow-sm p-6">
        <h1 class="text-3xl md:text-4xl font-bold uppercase primary-color mb-3">
            Peraturan dan Tata Tertib Murid
        </h1>
        <p class="mt-2 font-semibold text-lg">SMK Negeri 1 Kawali</p>
        <p class="text-slate-600">
            Tahun Pelajaran 2024 / 2025
        </p>
    </div>

    <!-- BAB I -->
    <section class="bg-white rounded-xl shadow-sm p-6 mb-8 scroll-mt-20" id="bab-i">
        <h2 class="text-2xl font-bold mb-4 primary-color">BAB I</h2>
        <h3 class="font-semibold text-lg mb-4">Dasar Pemikiran, Dasar Hukum, dan Tujuan</h3>

        <h4 class="font-semibold mt-6 text-lg">Pasal 1<br>Dasar Pemikiran</h4>
        <p class="mt-3 text-justify">
            Tata tertib kehidupan sosial sekolah bersumber pada nilai-nilai keagamaan akhlak mulia, nilai sosial budaya seperti adat istiadat setempat yang dihormati. Dalam penerapannya tata tertib tersebut tetap dalam kerangka pengembangan budaya nasional, hak-hak asasi manusia (HAM), implementasi dari kurikulum dan nilai-nilai lain yang mendukung proses pendidikan yang efektif, yang sifatnya mencerminkan kebutuhan sekolah dalam konteks sosial sekolah, lingkungan, dan masyarakat. Program pembentukan kepribadian dan program manajemen peningkatan mutu berbasis sekolah (school-based quality improvement) sebagai salah satu manajemen pendidikan kita di masa depan telah dirintis di sejumlah sekolah, termasuk di SMK Negeri 1 Kawali.
        </p>
        <p class="mt-3 text-justify">
            Di SMK Negeri 1 Kawali program tersebut dibuat dengan mengacu pada visi dan misi sekolah, yakni "Terwujudnya lulusan yang berakhlak mulia, unggul, profesional dan berdaya saing global pada tahun 2026". Untuk mencapai visi tersebut, diperlukan karakter murid yang berdisplin tinggi, taat dan patuh pada ajaran agama, serta menguasai teknologi dengan penuh tanggung jawab. Oleh karena itu, dibuatlah sebuah pedoman tata tertib yang mengarahkan murid agar terbentuk karakater yang diharapkan.
        </p>

        <h4 class="font-semibold mt-6 text-lg">Pasal 2<br>Dasar Hukum</h4>
        <ol class="list-decimal list-inside mt-3 space-y-2">
            <li>Undang-undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional</li>
            <li>Peraturan Pemerintah Nomor 19 Tahun 2005 tentang Standar Nasional Pendidikan</li>
            <li>Keputusan Menteri Pendidikan Nasional Nomor 21, 22, 23 dan 24 tentang Standar Isi, Standar Hasil dan Pelaksanaan Kepmen Nomor 21, 22 dan 23 tahun 2016</li>
            <li>Peraturan Menteri Pendidikan Nasional Nomor 39 Tahun 2008 tentang Pembinaan Kemuridan</li>
            <li>Permendikbud No. 45 tahun 2014 tentang pakaian seragam sekolah bagi peserta didik pada jenjang pendidikan dasar dan menengah</li>
            <li>Keputusan Kwartir Nasional Gerakan Pramuka No 174 tahun 2012 tentang petunjuk penyelenggaraan pakaian sragam anggota gerakan pramuka</li>
        </ol>

        <h4 class="font-semibold mt-6 text-lg">Pasal 3<br>Tujuan</h4>
        <ol class="list-decimal list-inside mt-3 space-y-2">
            <li>Sebagai pedoman pelaksanaan tatatertib murid di lingkungan SMK Negeri 1 Kawali</li>
            <li>Mengarahkan perilaku murid di lingkungan SMK Negeri 1 Kawali</li>
            <li>Mewujudkan ketertiban di lingkungan SMK Negeri 1 Kawali</li>
            <li>Membekali murid dalam proses penyesuaian diri dengan lingkungan di mana pun dia berada</li>
            <li>Menjaga dan menjamin keadaan serta suasana belajar. Tata tertib di sekolah, di tiap-tiap kelas, dan dalam semua kegiatan merupakan syarat mutlak bagi hidup dan kelancaran proses mengajar maupun belajar di sekolah</li>
            <li>Membentuk kepribadian. Pembentukan kepribadian akan terlaksana apabila tingkah laku dilandaskan pada asas-asas yang benar dan peraturan yang berlaku. Semangat kejujuran, keterbukaan dan disiplin harus menjiwai kesanggupan menaati peraturan-peraturan sekolah</li>
        </ol>
    </section>

    <!-- BAB II -->
    <section class="bg-white rounded-xl shadow-sm p-6 mb-8 scroll-mt-20" id="bab-ii">
        <h2 class="text-2xl font-bold mb-4 primary-color">BAB II</h2>
        <h3 class="font-semibold text-lg mb-4">Ketentuan Umum</h3>

        <h4 class="font-semibold mt-4">Pasal 1<br>Tata Tertib Murid</h4>
        <ol class="list-decimal list-inside mt-3 space-y-2">
            <li>
                <p class="font-medium">Dimaksudkan sebagai rambu-rambu bagi murid dalam bersikap, berucap, bertindak dan melaksanakan kegiatan sehari-hari di sekolah dalam rangka menciptakan iklim/kultur sekolah yang dapat menunjang kegiatan pembelajaran yang efektif.</p>
            </li>
            <li>
                <p class="font-medium">Dibuat berdasarkan nilai-nilai yang dianut sekolah dan masyarakat sekitar, yang meliputi: nilai ketakwaan, rendah hati, sopan santun, kejujuran, kedisiplinan, ketangguhan, keberanian, ketertiban, kebersihan, kesehatan, kerapian, keamanan, dan nilai-nilai yang mendukung kegiatan belajar yang efektif.</p>
            </li>
            <li>
                <p class="font-medium">Setiap murid wajib melaksanakan ketentuan yang tercantum dalam tata tertib secara konsekuen, ikhlas, dan penuh kesadaran</p>
            </li>
        </ol>
    </section>

    <!-- BAB III -->
    <section class="bg-white rounded-xl shadow-sm p-6 mb-8 scroll-mt-20" id="bab-iii">
        <h2 class="text-2xl font-bold mb-4 primary-color">BAB III</h2>
        <h3 class="font-semibold text-lg mb-4">Hak dan Kewajiban Murid</h3>

        <h4 class="font-semibold mt-6 text-lg">Pasal 1<br>Hak-Hak Murid</h4>
        <ol class="list-decimal list-inside mt-3 space-y-2">
            <li>Murid berhak mendapatkan pendidikan, pengajaran dan bimbingan sesuai dengan ketentuan yang berlaku</li>
            <li>Murid yang berprestasi dalam kegiatan OSN, LKS, O2SN dan FLS2N serta kegiatan yang mengharumkan nama sekolah mulai dari tingkat Kabupaten, Provinsi, nasional sampai dengan tingkat International mendapatkan penghargaan yang layak sesuai dengan aturan yang berlaku</li>
            <li>Murid berhak mendapat perlakuan yang sama dan proporsional dalam mendapatkan pelayanan standar dari SMK Negeri 1 Kawali</li>
        </ol>

        <h4 class="font-semibold mt-6 text-lg">Pasal 2<br>Kewajiban Murid</h4>
        
        <h5 class="font-medium mt-4 text-md">Ayat 1<br>Pakaian Seragam</h5>
        <p class="mt-2">Murid wajib mengenakan pakaian seragam sekolah dengan ketentuan sebagai berikut:</p>
        
        <h6 class="font-medium mt-4">Umum</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Sopan dan rapi sesuai dengan ketentuan yang berlaku</li>
            <li>Senin memakai baju putih - bawahan abu tua berdasi abu dan menggunakan evolet sesuai dengan jurusan dan tingkat kelas</li>
            <li>Selasa memakai baju batik sekolah-bawahan abu tua berdasi abu</li>
            <li>Rabu memakai seragam Pramuka</li>
            <li>Kamis menggunakan pakaian Adat laki-laki memakai pangsi (baju batik bebas) dan perempuan kebaya</li>
            <li>Jumat memakai baju Busana Muslim</li>
            <li>Memakai badge OSIS dan identitas sekolah</li>
            <li>Memakai ikat pinggang berwarna hitam lebar maksimum gesper 3 cm</li>
            <li>Senin-Selasa Memakai kaos kaki warna putih, Rabu-Kamis memakai kaos kaki hitam minimal 5 cm di atas mata kaki, sepatu dominan warna hitam</li>
            <li>Memakai kaos kaki warna hitam sepatu warna hitam untuk hari Jum'at</li>
            <li>Pakaian tidak terbuat dari kain yang tipis dan tembus pandang, tidak ketat dan tidak membentuk tubuh</li>
            <li>Tidak mengenakan atribut selain atribut resmi SMK Negeri 1 Kawali</li>
            <li>Tidak mengenakan jaket/sweater selama kegiatan sekolah, kecuali dengan izin khusus</li>
            <li>Memakai pakaian/kaus dalam</li>
        </ul>
        
        <h6 class="font-medium mt-4">Khusus Pria</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Celana tidak sobek, dibuka jahitannya, atau ditambal</li>
            <li>Tidak memakai perhiasan atau aksesoris seperti: Kalung, gelang, anting dan cincin</li>
        </ul>
        
        <h6 class="font-medium mt-4">Khusus Wanita</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Pakaian/baju seragam yang sedang dikenakan, selalu dimasukan ke dalam rok kecuali seragam pramuka</li>
            <li>Rok abu panjang sampai dengan mata kaki dengan lipit hadap pada tengah muka</li>
            <li>Memakai kerudung segi empat tidak menerawang, Senin-Selasa warna putih, Rabu warna coklat tua, Kamis- Jumat warna hitam (boleh memakai kerudung blouse)</li>
            <li>Khusus peserta didik muslimah diwajibkan mengenakan pakaian khas muslimah</li>
            <li>Tidak memakai perhiasan atau aksesoris yang mencolok dan berlebihan</li>
            <li>Lengan baju tidak dilipat atau digulung</li>
            <li>Model baju di ban atau dikancing</li>
        </ul>
        
        <h6 class="font-medium mt-4">Pakaian Olahraga</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Murid wajib mengenakan pakaian olahraga yang telah ditetapkan sekolah</li>
            <li>Menggunakan kerudung warna bebas yang wajib menutupi dada (khusus Wanita)</li>
            <li>Diperbolehkan menggunakan sepatu olahraga pada saat jam pelajaran olahraga</li>
        </ul>
        
        <h6 class="font-medium mt-4">Pakaian khusus praktik</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Pakaian tersebut wajib dikenakan pada saat jam pelajaran praktik</li>
        </ul>
        
        <h6 class="font-medium mt-4">Pakaian khusus organisasi</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Pakaian tersebut hanya digunakan pada saat kegiatan organisasi</li>
        </ul>

        <h5 class="font-medium mt-6 text-md">Pasal 3<br>Rambut, Kuku, Tato, Make Up</h5>
        
        <h6 class="font-medium mt-4">Umum</h6>
        <p class="mt-2">Murid dilarang:</p>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Berkuku panjang, bertato</li>
            <li>Mengecat rambut dan kuku</li>
            <li>Alis tidak boleh dicukur habis</li>
        </ul>
        
        <h6 class="font-medium mt-4">Khusus Pria</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Rambut ukuran 4 cm</li>
            <li>Tidak bertindik</li>
            <li>Rambut tidak dimodifikasi</li>
            <li>Rambut tidak dicukur habis</li>
        </ul>
        
        <h6 class="font-medium mt-4">Khusus Wanita</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Rambut murid wanita disisir rapi atau diikat</li>
            <li>Tidak diperbolehkan mewarnai rambut</li>
            <li>Tidak memakai make-up berlebihan ke sekolah</li>
        </ul>

        <h5 class="font-medium mt-6 text-md">Pasal 4<br>Masuk, Proses KBM, dan Pulang Sekolah</h5>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Murid wajib hadir di lingkungan sekolah selambat-lambatnya pukul 06.20 WIB</li>
            <li>Murid wajib melakukan absensi chek in sekolah pada aplikasi yang sudah disediakan</li>
            <li>Sesudah pukul 06.30 WIB, murid melaksanakan kegiatan positif</li>
            <li>Murid yang terlambat datang maksimal pukul 06.30 WIB harus melapor kepada guru mapel dan diizinkan masuk kelas</li>
            <li>Murid yang terlambat datang ke sekolah lebih dari pukul 06.30 WIB harus lapor kepada guru piket dan diizinkan masuk kelas pada pelajaran berikutnya, setelah mendapatkan pembinaan dari guru piket, pembina OSIS, guru BK atau wakasek di SMK Negeri 1 Kawali</li>
            <li>Murid yang tidak dapat hadir karena sakit atau sebab lain, wajib membuat surat keterangan dokter atau orang tua/wali yang bersangkutan, dan melakukan absen izin atau sakit melalui aplikasi yang telah disediakan</li>
            <li>Selama proses belajar murid tidak diperkenankan menggunakan alat komunikasi yang tidak berkaitan dengan proses belajar mengajar</li>
            <li>Selama pelajaran berlangsung/pada pergantian jam/ketika guru berhalangan hadir, murid dilarang berada di luar kelas, atau meninggalkan kelas tanpa izin guru kelas/piket</li>
            <li>Ketika pembelajaran praktik, murid harus berada di tempat/ruang praktik</li>
            <li>Setiap tepat pukul 10.00 WIB murid wajib berhenti melakukan aktifitas sejenak dan berdiri untuk membacakan Pancasila dan menyanyikan lagu Indonesia Raya</li>
            <li>Setelah KBM berakhir murid berdo'a, wajib melaksanakan kebersihan kelas (piket) sebelum meninggalkan sekolah</li>
            <li>Murid dapat meninggalkan sekolah sebelum jam pelajaran berakhir dengan alasan sakit atau permintaan orang tua atau kepentingan lain setelah mendapat izin guru piket dan guru mata pelajaran. Surat izin meninggalkan sekolah diserahkan kembali kepada walikelas keesokan harinya</li>
            <li>Salam resmi yang digunakan bagi murid muslim adalah "Assalaamu'alaikum", sedangkan bagi nonmuslim adalah "selamat pagi/siang/sore"</li>
        </ul>

        <h5 class="font-medium mt-6 text-md">Pasal 5<br>Kebersihan, Kedisiplinan, Ketertiban dan Sopan Santun</h5>
        
        <h6 class="font-medium mt-4">Lingkungan Kelas</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Setiap kelas membentuk tim piket kelas yang secara bergiliran bertugas menjaga kebersihan, dan ketertiban, serta memelihara perlengkapan kelas</li>
            <li>Tim piket kelas mempunyai tugas sebagai berikut:
                <ul class="list-circle list-inside mt-1 space-y-1 ml-4">
                    <li>Membersihkan papan tulis setiap pergantian pelajaran</li>
                    <li>Membantu menyiapkan dan membereskan perlengkapan KBM</li>
                    <li>Membersihkan kelas serta merapikan bangku-bangku dan meja setelah KBM berakhir</li>
                    <li>Merapikan hiasan dinding kelas, seperti struktur organisasi kelas, jadwal piket, papan absensi dan hiasan lainnya</li>
                    <li>Melaporkan kepada guru piket tentang tindakan-tindakan pelanggaran di kelas yang menyangkut kebersihan dan ketertiban kelas, misalnya mengotori atau merusak sarana yang ada di kelas</li>
                </ul>
            </li>
            <li>Sebelum pulang seluruh murid melakukan doa bersama serta mengucapkan terima kasih kepada guru</li>
        </ul>
        
        <h6 class="font-medium mt-4">Lingkungan Sekolah</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Setiap murid menjaga kebersihan kamar kecil/toilet, dan seluruh lingkungan sekolah lainnya</li>
            <li>Setiap murid membuang sampah pada tempatnya</li>
            <li>Setiap murid membiasakan budaya antre dalam mengikuti berbagai kegiatan sekolah yang berlangsung pada waktu bersamaan</li>
            <li>Setiap murid menjaga suasana ketenangan belajar, baik di kelas, di perpustakaan, di laboratorium, dan tempat praktik maupun di tempat lain di lingkungan sekolah</li>
            <li>Setiap murid menaati peraturan yang berlaku di perpustakaan, penggunaan laboratorium, tempat praktik dan tempat belajar lainnya</li>
            <li>Setiap murid wajib mengikuti satu kegiatan ekstrakurikuler dan hanya diperkenankan mengikuti maksimal dua kegiatan ekstrakurikuler dan satu organisasi</li>
        </ul>
        
        <h6 class="font-medium mt-4">Upacara Bendera</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Semua murid wajib mengikuti upacara bendera hari Senin, kecuali yang mendapat dispensasi/ijin dari guru piket</li>
            <li>Memakai topi saat upacara bendera dengan topi yang sudah ditentukan oleh sekolah kecuali ada rekomendasi dari kepala sekolah dan atau guru yang diberi wewenang untuk menentukan topi lain</li>
            <li>Pada hari pelaksanaan upacara, murid wajib mengenakan seragam sesuai dengan jadwal seragam yang telah ditentukan</li>
        </ul>
        
        <h6 class="font-medium mt-4">Sopan santun dan Hubungan kekeluargaan</h6>
        <ul class="list-disc list-inside mt-2 space-y-1 ml-4">
            <li>Setiap murid wajib bersikap sopan baik di sekolah maupun di luar sekolah</li>
            <li>Murid wajib menunjukkan tingkah laku sopan dan hormat kepada siapapun: Orang tua, Bapak/Ibu guru atau pendidik, karyawan, penjual di kantin, tamu dan sesama murid. Misalnya: memberi salam/tanda hormat kepada guru sewaktu bertemu/berpisah, memberi jalan kepada orang yang mau lewat, duduk pada kursi (bukan meja) dan lain sebagainya</li>
            <li>Kesempatan jajan di kantin hanya pada saat sebelum/sesudah jam sekolah, waktu jam istirahat, dan sesudah pelajaran Olah Raga untuk yang bersangkutan</li>
            <li>Para murid diwajibkan menjaga dan melaksanakan Kebersihan, Ketertiban, Keamanan, Kesehatan, Kekeluargaan</li>
        </ul>
    </section>

    <!-- BAB VI - Larangan -->
    <section class="bg-white rounded-xl shadow-sm p-6 mb-8 scroll-mt-20" id="bab-vi">
        <div class="flex items-center mb-4">
            <h2 class="text-2xl font-bold primary-color">BAB VI</h2>
            <div class="ml-3 px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-medium">Penting</div>
        </div>
        <h3 class="font-semibold text-lg mb-4 danger-color">Larangan</h3>
        <p class="mt-2 mb-4">Murid-murid selama Jam Kegiatan Belajar Mengajar (KBM), dilarang:</p>
        
        <div class="bg-red-50 rounded-lg p-4 mb-4">
            <ul class="list-disc list-inside space-y-2">
                <li>Membawa segala macam buku bacaan yang tidak sopan, gambar-gambar porno, kaset audio, kaset video, VCD, DVD, walkman, radio, kamera, atau alat elektronik yang tidak berkaitan dengan pelajaran, senjata tajam, kartu/alat games atau judi, rokok/korek api, rokok elektronik, maupun segala jenis minuman keras dan obat terlarang</li>
                <li>Membawa dan menggunakan alat elektronik music (ipod, radio, Walkman, headset) dalam waktu pembelajaran, tanpa seizin dari guru kelas</li>
                <li>Merokok di lingkungan dan sekitar sekolah, dan maupun kegiatan yang diadakan di luar sekolah (selama 24 jam)</li>
                <li>Membawa atau menggunakan obat terlarang/minuman keras</li>
                <li>Melakukan tawuran terhadap sesama murid SMK Negeri 1 Kawali maupun dengan pihak lain</li>
                <li>Melakukan praktik perjudian dan atau main kartu di lingkungan sekolah dan sekitarnya</li>
                <li>Melakukan perbuatan asusila</li>
                <li>Memakai pakaian yang "compang-camping" (celana pendek, robek) selama kegiatan sekolah</li>
                <li>Memakai perhiasan yang berlebihan</li>
                <li>Memakai/menggunakan make up, lipstik, cat kuku dan mewarnai rambut selain warna hitam, memiliki potongan rambut yang nyentrik/aneh</li>
                <li>Membuat atau Memakai baju jaket selain jaket resmi sekolah</li>
                <li>Membawa senjata, pisau, pistol, bahan peledak, (membunyikan petasan) dan lain lain yang memungkinkan untuk membahayakan diri sendiri dan orang lain</li>
                <li>Pinjam-meminjam barang barang berharga</li>
                <li>Mencuri atau merugikan orang lain dengan sengaja</li>
                <li>Berkelahi/menghasut/mengitimidasi murid siswi lainnya dilingkungan sekolah atau diluar sekolah</li>
                <li>Menerima tamu pada saat jam belajar berlangsung tanpa seizin guru piket</li>
                <li>Berolah raga saat jam belajar kecuali pelajaran olah raga</li>
                <li>Memakai sendal atau sepatu diinjak pada bagian belakangnya</li>
                <li>Berada di kantin saat jam jam belajar atau pergantian waktu</li>
                <li>Mencoret coret peralatan pembelajaran didalam kelas termasuk: tembok, AC, LCD, dan merusak fasilitas sekolah</li>
                <li>Berkerumun dan berada di luar lingkungan sekolah sebelum jam pelajaran dimulai, pada jam istirahat, atau pulang sekolah</li>
                <li>Membuang sampah sembarangan</li>
                <li>Membentuk organisasi serta kegiatan ekstra lain dan melakukan kegiatan-kegiatan di dalam atau di luar sekolah dengan menggunakan nama SMK Negeri 1 Kawali tanpa seizin kepala sekolah</li>
                <li>Merokok, melompat pagar, mengajak murid sekolah lain untuk berkerumun dilingkungan sekolah</li>
                <li>Memalsukan dokumen</li>
                <li>Mengikuti organisasi/LSM diluar sekolah (yang tidak baik)</li>
                <li>Menjalin hubungan yang berlebihan di sekolah, dengan sesama jenis (LGBT), dan melakukan pergaulan bebas</li>
            </ul>
        </div>
    </section>

    <!-- BAB VII - Sanksi -->
    <section class="bg-white rounded-xl shadow-sm p-6 mb-8 scroll-mt-20" id="bab-vii">
        <div class="flex items-center mb-4">
            <h2 class="text-2xl font-bold primary-color">BAB VII</h2>
            <div class="ml-3 px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-medium">Penting</div>
        </div>
        <h3 class="font-semibold text-lg mb-4 warning-color">Sanksi-Sanksi dan Penghargaan</h3>
        
        <div class="mb-6">
            <h4 class="font-semibold text-md mb-3">Ayat 1<br>Sanksi Poin Negatif</h4>
            <p class="mt-2 mb-4">Dalam sanksi dipergunakan sistem poin, dengan istilah point negatif, yaitu:</p>
            
            <div class="regulation-table bg-orange-50 rounded-lg p-4">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-100">
                            <th class="border border-orange-200 px-4 py-2 text-left">Kategori Pelanggaran</th>
                            <th class="border border-orange-200 px-4 py-2 text-center">Jumlah Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="border border-orange-200 px-4 py-2 font-semibold bg-orange-100">Pakaian / Seragam (P)</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Senin tidak berpakaian PSAS (Putih-Abu) lengkap</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Selasa tidak berpakaian Batik (Batik-Abu)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Rabu tidak berpakaian pramuka lengkap (memakai hasduk)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Kamis tidak menggunakan pakaian adat</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Jum'at tidak tidak menggunakan pakaian busana muslim</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Senin-Jum'at tidak bersepatu hitam, Senin-selasa tidak berkaos kaki putih, Rabu-Kamis tidak berkaos kaki hitam Jum'at tidak berkaos kaki warna hitam</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak berikat pinggang hitam (lebar maksimal 3 cm gesper seimbang)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak memakai topi saat upacara bendera</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak memakai rok/celana panjang, ke atas sebatas pinggang, ke bawah sebatas mata kaki</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Berpakaian ketat</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Model seragam tidak rapih/tidak sopan</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Memakai jaket/sweater/ topi bebas di dalam lingkungan sekolah selama KBM berlangsung</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Baju seragam tidak dimasukan</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak menggunakan kerudung bagi peserta didik putri (muslimah)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak menggunakan pakaian olahraga yang ditetapkan sekolah pada saat jam pelajaran olahraga</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak menggunakan kerudung hitam pada saat jam pelajaran olahraga</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-orange-200 px-4 py-2 font-semibold bg-orange-100">Rambut (R)</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Dicat selain warna hitam</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Model rambut bagian depan melebihi alis, bagian samping melebihi telinga, dan bagian belakang melebihi kerah baju</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Model rambut Dimodifikasi</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak tertutupi kerudung (Khusus Perempuan)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-orange-200 px-4 py-2 font-semibold bg-orange-100">Aksesoris (A)</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Memakai cat/pacar kuku</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Make Up berlebihan (Eye Shadow, lip stick)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Laki-laki memakai perhiasan</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Perempuan memakai perhiasan berlebihan</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Berkuku panjang</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-orange-200 px-4 py-2 font-semibold bg-orange-100">Kehadiran (K)</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Terlambat masuk pintu gerbang >5 menit (masuk pukul 06.50)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Terlambat masuk kelas > 10 menit</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Bolos/Kabur/Pilih pelajaran</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">10</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Alpa</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Surat Palsu</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">10</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Keluar kelas tanpa izin guru</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Keluar lingkungan Sekolah tanpa izin piket guru</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak mengikuti tadarus dan atau pembacaan Surat Yasin</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak mengikuti upacara bendera</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Terlambat mengikuti upacara bendera (saat bendera sudah naik)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Izin (tanpa keterangan) lebih dari 3 hari berturut-turut</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Sakit lebih dari 6 hari tanpa surat keterangan petugas kesehatan/dokter/orang tua</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak mengikuti kegiatan yang dilaksanakan disekolah (keagamaan, keosisan, belanegara, dll)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">15</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-orange-200 px-4 py-2 font-semibold bg-orange-100">Kebersihan (Kb)</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak melaksanakan tugas piket kelas</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membuang sampah tidak pada tempatnya</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Mencoret-coret sarana dan prasarana sekolah</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">10</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Menggunakan WC kepala sekolah, guru dan karyawan</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Merusak tanaman lingkungan sekolah</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Makan dan minum di dalam kelas/ruang praktek selama KBM berlangsung</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Merusak / menghilangkan sarana dan prasarana sekolah dengan sengaja</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">25</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-orange-200 px-4 py-2 font-semibold bg-orange-100">Tingkah Laku (TL)</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Keluar /masuk ruangan melewati jendela</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">10</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Berkata tidak sopan</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">5</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Memanggil nama buruk yang bukan namanya</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">5</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Selama KBM berlangsung: Menggunakan HP</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membawa dan menggunakan alat musik (walkman, radio, ipod, dll)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Menyontek memberi informasi saat ulangan berlangsung</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Bersolek</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak mengerjakan tugas dari guru</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Mengganggu KBM</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak membawa peralatan belajar</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membaca/mengerjakan pelajaran yang lain</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidur di kelas</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Ganti pakaian olah raga diwaktu pelajaran bukan olahraga</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membawa kendaraan tidak sesuai ketentuan lalu lintas</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Memarkir kendaraan tidak pada tempatnya</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak menggunakan seragam praktek/menggunakan milik orang lain</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Mengendarai kendaraan dalam keadaan mesin hidup selama KBM berlangsung di dalam lingkungan sekolah (mesin kendaraan harus dimatikan dari gerbang ke tempat parkir atau dari tempat parkir ke gerbang) kecuali keseluruhan KBM sudah berakhir</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tidak melaksanakan Kegiatan hari jum'at (Kebersihan,Kerohanian,Olahraga)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">4</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-orange-200 px-4 py-2 font-semibold bg-orange-100">Susila (S)</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Menyalahgunaan barang cetakan/elektronik yang bersifat sara, sosial dan porno</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">30</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membawa atau merokok di lingkungan sekolah (radius 100 m)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">30</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Berpacaran di sekolah</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">25</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Anggota badan bertato dan bertindik (pria)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">30</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Berprilaku buruk terhadap kepala sekolah, guru dan karyawan</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">50</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membawa alat kontrasepsi</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">50</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Bermain judi /kartu di Sekolah</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">50</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Berbohong, memfitnah, menuduh, mengancam, mengintimidasi</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">50</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-orange-200 px-4 py-2 font-semibold bg-orange-100">Pelanggaran Berat (PB)</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membawa senjata tajam tanpa izin</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">75</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Menganiaya</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">75</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Berkelahi</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">75</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Mengikuti organisasi/LSM diluar sekolah (yang tidak baik)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">100</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Menjalin hubungan yang berlebihan di sekolah, dengan sesama jenis (LGBT)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">100</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Tawuran</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">100</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Mengganti/memalsukan dokumen (rapot, ijazah, dsb)</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">100</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Mencuri/menipu</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">100</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Pemerasan</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">100</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Melawan secara fisik terhadap kepala sekolah, guru, dan karyawan sekolah</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membawa/menggunakan/mengedarkan NARKOBA</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Membawa/menggunakan/mengedarkan MIRAS</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Hamil (sengaja/terencana) /menghamili</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Menikah</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Pelecehan seksual</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Sex bebas, bergaul bebas, bergaul sesama jenis</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Memperkosa</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-200 px-4 py-2">Terbukti terlibat geng motor, sekolah berhak mengeluarkan murid</td>
                            <td class="border border-orange-200 px-4 py-2 text-center">200</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mb-6">
            <h4 class="font-semibold text-md mb-3">Ayat 2<br>Penghargaan Poin Positif</h4>
            
            <div class="regulation-table bg-green-50 rounded-lg p-4">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-green-100">
                            <th class="border border-green-200 px-4 py-2 text-left">Kategori Prestasi</th>
                            <th class="border border-green-200 px-4 py-2 text-center">Jumlah Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2" class="border border-green-200 px-4 py-2 font-semibold bg-green-100">Prestasi Lomba</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Kelas: Juara I</td>
                            <td class="border border-green-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Kelas: Juara II</td>
                            <td class="border border-green-200 px-4 py-2 text-center">3</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Kelas: Juara III</td>
                            <td class="border border-green-200 px-4 py-2 text-center">2</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Sekolah/Kecamatan: Juara I</td>
                            <td class="border border-green-200 px-4 py-2 text-center">6</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Sekolah/Kecamatan: Juara II</td>
                            <td class="border border-green-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Sekolah/Kecamatan: Juara III</td>
                            <td class="border border-green-200 px-4 py-2 text-center">3</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Kabupaten: Juara I</td>
                            <td class="border border-green-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Kabupaten: Juara II</td>
                            <td class="border border-green-200 px-4 py-2 text-center">6</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Kabupaten: Juara III</td>
                            <td class="border border-green-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Wilayah: Juara I</td>
                            <td class="border border-green-200 px-4 py-2 text-center">10</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Wilayah: Juara II</td>
                            <td class="border border-green-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Wilayah: Juara III</td>
                            <td class="border border-green-200 px-4 py-2 text-center">6</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Propinsi: Juara I</td>
                            <td class="border border-green-200 px-4 py-2 text-center">12</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Propinsi: Juara II</td>
                            <td class="border border-green-200 px-4 py-2 text-center">10</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Propinsi: Juara III</td>
                            <td class="border border-green-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Nasional: Juara I</td>
                            <td class="border border-green-200 px-4 py-2 text-center">40</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Nasional: Juara II</td>
                            <td class="border border-green-200 px-4 py-2 text-center">30</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tingkat Nasional: Juara III</td>
                            <td class="border border-green-200 px-4 py-2 text-center">20</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-green-200 px-4 py-2 font-semibold bg-green-100">Prestasi Keagamaan</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tahfid Surat-surat Al-Qur'an: 5 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">2</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tahfid Surat-surat Al-Qur'an: 10 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tahfid Surat-surat Al-Qur'an: 15 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">6</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tahfid Surat-surat Al-Qur'an: 20 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tahfid Surat-surat Al-Qur'an: > 20 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">20</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Tahfidz Qur'an / Juz</td>
                            <td class="border border-green-200 px-4 py-2 text-center">40</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Membaca Surat – surat Al-Qur'an: 10 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">2</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Membaca Surat – surat Al-Qur'an: 14 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Membaca Surat – surat Al-Qur'an: 16 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">6</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Membaca Surat – surat Al-Qur'an: 18 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">8</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Membaca Surat – surat Al-Qur'an: ≥ 20 surat</td>
                            <td class="border border-green-200 px-4 py-2 text-center">15</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Qur'an /Juz</td>
                            <td class="border border-green-200 px-4 py-2 text-center">30</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" class="border border-green-200 px-4 py-2 font-semibold bg-green-100">Prestasi Organisasi</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Pengurus inti kelas (KM, WKM. Sekretaris, Bendahara) /semester</td>
                            <td class="border border-green-200 px-4 py-2 text-center">2</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Anggota MPK/semester</td>
                            <td class="border border-green-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Pengurus inti MPK/semester</td>
                            <td class="border border-green-200 px-4 py-2 text-center">6</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Anggota pengurus OSIS/semester</td>
                            <td class="border border-green-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Pengurus inti OSIS/semester</td>
                            <td class="border border-green-200 px-4 py-2 text-center">6</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Pengurus organisasi otonomi: Tingkat Kecamatan</td>
                            <td class="border border-green-200 px-4 py-2 text-center">4</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Pengurus organisasi otonomi: Tingkat Kabupaten</td>
                            <td class="border border-green-200 px-4 py-2 text-center">6</td>
                        </tr>
                        <tr>
                            <td class="border border-green-200 px-4 py-2">Pengurus organisasi otonomi: Tingkat Wilayah</td>
                            <td class="border border-green-200 px-4 py-2 text-center">8</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mb-6">
            <h4 class="font-semibold text-md mb-3">Pasal 7<br>Bentuk-Bentuk Sanksi</h4>
            <p class="mt-2 mb-4">Bentuk sanksi pelanggaran berdasarkan akumulasi point negatif sebagai berikut:</p>
            
            <div class="regulation-table bg-red-50 rounded-lg p-4">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-red-100">
                            <th class="border border-red-200 px-4 py-2 text-center">No</th>
                            <th class="border border-red-200 px-4 py-2">Jumlah Poin</th>
                            <th class="border border-red-200 px-4 py-2">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">1</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥12</td>
                            <td class="border border-red-200 px-4 py-2">Teguran lisan</td>
                        </tr>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">2</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥18</td>
                            <td class="border border-red-200 px-4 py-2">Peringatan tertulis</td>
                        </tr>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">3</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥22</td>
                            <td class="border border-red-200 px-4 py-2">Peringatan tertulis disampaikan kepada orang tua</td>
                        </tr>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">4</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥50</td>
                            <td class="border border-red-200 px-4 py-2">Pemanggilan orang tua</td>
                        </tr>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">5</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥75</td>
                            <td class="border border-red-200 px-4 py-2">Murid dan orang tua membuat surat perjanjian bermaterai</td>
                        </tr>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">6</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥100</td>
                            <td class="border border-red-200 px-4 py-2">Murid diskor selama tiga hari</td>
                        </tr>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">7</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥135</td>
                            <td class="border border-red-200 px-4 py-2">Murid diskor selama enam hari</td>
                        </tr>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">8</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥175</td>
                            <td class="border border-red-200 px-4 py-2">Murid diminta pindah sekolah</td>
                        </tr>
                        <tr>
                            <td class="border border-red-200 px-4 py-2 text-center">9</td>
                            <td class="border border-red-200 px-4 py-2 text-center">≥200</td>
                            <td class="border border-red-200 px-4 py-2">Murid dikembalikan kepada orang tua</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-6 space-y-4">
                <div>
                    <h5 class="font-semibold text-md">Khusus Keterlambatan:</h5>
                    <ol class="list-decimal list-inside mt-2 space-y-2 ml-4">
                        <li>2 kali: peringatan dan pembinaan oleh wali kelas dan guru BK</li>
                        <li>3 kali: diundang orang tuanya, membuat perjanjian tertulis dihadapan wali kelas dan diberikan pembinaan</li>
                        <li>5 kali: peringatan keras oleh wali kelas dan wakil kemuridan, dilanjutkan pembinaan dari guru BK</li>
                        <li>6 kali: orang tua diundang untuk membuat perjanjian secara tertulis bermaterai, dihadapan wakil kemuridan dan murid diberikan skorsing 1 hari</li>
                        <li>9 kali: orang tua diundang untuk membuat perjanjian secara tertulis bermaterai dihadapan kepala sekolah dan murid diberikan skorsing 3 hari</li>
                        <li>10 kali: dilaksanakan konferensi kasus</li>
                    </ol>
                </div>
                
                <div>
                    <h5 class="font-semibold text-md">Khusus Kehadiran (Tidak Masuk Tanpa Keterangan (Alpa)):</h5>
                    <ol class="list-decimal list-inside mt-2 space-y-2 ml-4">
                        <li>3 kali: orang tua diundang dan murid diberikan pembinaan secara khusus</li>
                        <li>4 kali: orang tua diundang untuk membuat perjanjian tertulis bermaterai dihadapan wakil kemuridan, murid diberikan skorsing 1 hari/bakti masyarakat</li>
                        <li>5 kali: orang tua diundang untuk membuat perjanjian tertulis bermaterai dihadapan kepala sekolah, murid diberikan skors 2 hari/bakti masyarakat</li>
                        <li>6 kali: diadakan konferensi kasus</li>
                    </ol>
                </div>
                
                <div>
                    <h5 class="font-semibold text-md">Ketentuan Pelanggaran:</h5>
                    <ul class="list-disc list-inside mt-2 space-y-2 ml-4">
                        <li>Pelanggaran terhadap kewajiban, larangan-larangan dan aturan berpakaian akan diproses dengan ketentuan:
                            <ul class="list-circle list-inside mt-1 space-y-1 ml-4">
                                <li>Dinasehati langsung oleh guru/wali kelas/kemuridan</li>
                                <li>Dibina oleh guru bimbingan konseling</li>
                                <li>Mengundang orang tua murid serta membuat surat perjanjian bermaterai</li>
                                <li>Apabila masih melakukan pelanggaran, maka akan dilaksanakan konfrensi kasus, termasuk kasus khusus (Narkoba, hamil dan menghamili, dan dijadikan tersangka oleh pihak penyidik)</li>
                            </ul>
                        </li>
                        <li>Pelanggaran yang dilakukan diluar lingkungan sekolah berdasarkan laporan dari masyarakat menyangkut segala pelanggaran yang tercantum dalam tata tertib sekolah akan diproes berdasarkan ketentuan sekolah</li>
                        <li>Pelanggaraan yang menyangkut pelanggaran hukum/tindakan pidana akan diserahkan kepada pihak yang berwenang (kepolisian) untuk diproses secara hukum</li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="font-semibold text-md">Ketentuan Diberlakukan Tata Tertib, Poin dan Skorsing:</h5>
                    <ul class="list-disc list-inside mt-2 space-y-2 ml-4">
                        <li>Poin berlaku untuk satu tahun pelajaran</li>
                        <li>Poin positif berfungsi untuk mengurangi/menghapus poin negatif atau sebagai bentuk penghargaan prestasi</li>
                        <li>Untuk yang terkena Skorsing:
                            <ul class="list-circle list-inside mt-1 space-y-1 ml-4">
                                <li>Wajib menandatangani daftar hadir khusus (pagi dan siang) di petugas khusus/piket</li>
                                <li>Melaksanakan tugas yang diberikan guru piket (tidak bersifat perpeloncoan)</li>
                                <li>Belajar/mengerjakan tugas pelajaran pada hari itu di perpustakaan</li>
                            </ul>
                        </li>
                        <li>Tata tertib ini berlaku di lingkungan sekolah dan pada waktu sekolah</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <div class="text-center text-sm text-slate-500 py-6 border-t">
        <p>© {{ date('Y') }} SMK Negeri 1 Kawali</p>
        <p class="mt-1">Jl. Talagasari No. 35 Kawali, Kabupaten Ciamis 46253</p>
        <p class="mt-1">Telp. (0265) 791727 | e-mail: smkn1kawali@gmail.com</p>
    </div>
</div>

<!-- Scroll to top button -->
<button id="scrollToTop" class="scroll-to-top fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg hidden no-print hover:bg-blue-700 transition">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<script>
    // Scroll to top functionality
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    });
    
    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

</body>
</html>