<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Point - Sistem Informasi Poin Siswa</title>
    <link rel="stylesheet" href="/build/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #2B1B64;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1a0f3d;
        }
        
        /* Animasi */
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(43, 27, 100, 0.1);
        }
        
        /* Hero section background */
        .hero-bg {
            background: linear-gradient(135deg, #2B1B64 0%, #1a0f3d 100%);
        }
        
        /* Feature card animation */
        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        /* Mobile menu animation */
        .mobile-menu {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-ivory text-gray-800">

    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-accent to-yellow-400 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-primary">E-Point</span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-primary font-medium">Beranda</a>
                    <a href="#features" class="text-gray-700 hover:text-primary font-medium">Fitur</a>
                    <a href="#how-it-works" class="text-gray-700 hover:text-primary font-medium">Cara Kerja</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-primary font-medium">Testimoni</a>
                    <a href="#faq" class="text-gray-700 hover:text-primary font-medium">FAQ</a>
                </div>
                
                <!-- Login Button -->
                <div class="hidden md:block">
                    <a href="/login" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-purple-800 transition-colors duration-300">
                        Masuk
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-primary">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu hidden md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="text-gray-700 hover:text-primary font-medium">Beranda</a>
                    <a href="#features" class="text-gray-700 hover:text-primary font-medium">Fitur</a>
                    <a href="#how-it-works" class="text-gray-700 hover:text-primary font-medium">Cara Kerja</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-primary font-medium">Testimoni</a>
                    <a href="#faq" class="text-gray-700 hover:text-primary font-medium">FAQ</a>
                    <a href="/login" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-purple-800 transition-colors duration-300 text-center">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-bg text-white py-20 md:py-32">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Sistem Informasi Poin Siswa Terintegrasi</h1>
                    <p class="text-lg md:text-xl mb-8 text-purple-200">Kelola poin kebaikan dan pelanggaran siswa dengan mudah, transparan, dan efisien</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#features" class="bg-accent text-primary px-8 py-3 rounded-lg font-bold hover:bg-yellow-400 transition-colors duration-300 text-center">
                            Pelajari Lebih Lanjut
                        </a>
                        <a href="/login" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-bold hover:bg-white hover:text-primary transition-colors duration-300 text-center">
                            Masuk ke Sistem
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="w-64 h-64 md:w-80 md:h-80 bg-white/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-6xl md:text-8xl text-accent"></i>
                        </div>
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-accent rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-primary text-xl"></i>
                        </div>
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-accent rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-primary text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Fitur Unggulan E-Point</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Sistem yang dirancang khusus untuk memudahkan pengelolaan poin siswa di sekolah</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card">
                    <div class="w-16 h-16 rounded-lg bg-purple-100 flex items-center justify-center mb-6">
                        <i class="fas fa-chart-bar text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Dashboard Analitik</h3>
                    <p class="text-gray-600">Pantau statistik poin siswa secara real-time dengan visualisasi data yang mudah dipahami</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card">
                    <div class="w-16 h-16 rounded-lg bg-purple-100 flex items-center justify-center mb-6">
                        <i class="fas fa-mobile-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Akses Mobile</h3>
                    <p class="text-gray-600">Akses sistem dari mana saja melalui perangkat mobile dengan antarmuka yang responsif</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card">
                    <div class="w-16 h-16 rounded-lg bg-purple-100 flex items-center justify-center mb-6">
                        <i class="fas fa-bell text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Notifikasi Otomatis</h3>
                    <p class="text-gray-600">Kirim notifikasi otomatis kepada orang tua/wali siswa tentang poin yang diperoleh</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card">
                    <div class="w-16 h-16 rounded-lg bg-purple-100 flex items-center justify-center mb-6">
                        <i class="fas fa-file-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Laporan Komprehensif</h3>
                    <p class="text-gray-600">Hasilkan laporan detail tentang perkembangan poin siswa per periode waktu tertentu</p>
                </div>
                
                <!-- Feature 5 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card">
                    <div class="w-16 h-16 rounded-lg bg-purple-100 flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Keamanan Terjamin</h3>
                    <p class="text-gray-600">Sistem dilengkapi dengan enkripsi data dan kontrol akses berbasis peran</p>
                </div>
                
                <!-- Feature 6 -->
                <div class="bg-white rounded-xl shadow-lg p-6 feature-card">
                    <div class="w-16 h-16 rounded-lg bg-purple-100 flex items-center justify-center mb-6">
                        <i class="fas fa-users text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Multi-User</h3>
                    <p class="text-gray-600">Dukungan untuk berbagai peran pengguna: admin, guru, dan orang tua/wali siswa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16 md:py-24 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Cara Kerja E-Point</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Proses sederhana untuk mengelola poin siswa dengan efektif</p>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Step 1 -->
                <div class="flex flex-col items-center mb-10 md:mb-0 md:w-1/3">
                    <div class="w-24 h-24 rounded-full bg-primary flex items-center justify-center mb-4">
                        <span class="text-white text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">Input Data</h3>
                    <p class="text-gray-600 text-center">Guru mencatat kebaikan atau pelanggaran siswa melalui sistem</p>
                </div>
                
                <!-- Arrow -->
                <div class="hidden md:block text-primary text-4xl mb-10 md:mb-0">
                    <i class="fas fa-chevron-right"></i>
                </div>
                
                <!-- Step 2 -->
                <div class="flex flex-col items-center mb-10 md:mb-0 md:w-1/3">
                    <div class="w-24 h-24 rounded-full bg-primary flex items-center justify-center mb-4">
                        <span class="text-white text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">Proses Otomatis</h3>
                    <p class="text-gray-600 text-center">Sistem menghitung poin dan mengirim notifikasi ke orang tua</p>
                </div>
                
                <!-- Arrow -->
                <div class="hidden md:block text-primary text-4xl mb-10 md:mb-0">
                    <i class="fas fa-chevron-right"></i>
                </div>
                
                <!-- Step 3 -->
                <div class="flex flex-col items-center md:w-1/3">
                    <div class="w-24 h-24 rounded-full bg-primary flex items-center justify-center mb-4">
                        <span class="text-white text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-2">Analisis & Laporan</h3>
                    <p class="text-gray-600 text-center">Admin dapat melihat statistik dan menghasilkan laporan kapan saja</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Apa Kata Mereka</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Testimoni dari pengguna E-Point di berbagai sekolah</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-purple-200 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary">Budi Santoso</h4>
                            <p class="text-sm text-gray-600">Kepala Sekolah</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                    </div>
                    <p class="text-gray-600">"E-Point telah membantu sekolah kami dalam mengelola poin siswa dengan lebih transparan dan efisien. Sangat direkomendasikan!"</p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-purple-200 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary">Siti Nurhaliza</h4>
                            <p class="text-sm text-gray-600">Guru BK</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                    </div>
                    <p class="text-gray-600">"Sebagai guru BK, saya sangat terbantu dengan fitur notifikasi otomatis ke orang tua. Komunikasi jadi lebih mudah."</p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-purple-200 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-primary">Ahmad Rizki</h4>
                            <p class="text-sm text-gray-600">Orang Tua Siswa</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                        <i class="fas fa-star text-accent"></i>
                    </div>
                    <p class="text-gray-600">"Saya bisa memantau perkembangan anak saya di sekolah melalui notifikasi yang masuk ke ponsel. Praktis sekali!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 md:py-24 bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl md:text-5xl font-bold mb-2">50+</div>
                    <div class="text-purple-200">Sekolah</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold mb-2">10,000+</div>
                    <div class="text-purple-200">Siswa</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold mb-2">500+</div>
                    <div class="text-purple-200">Guru</div>
                </div>
                <div>
                    <div class="text-4xl md:text-5xl font-bold mb-2">98%</div>
                    <div class="text-purple-200">Kepuasan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Pertanyaan Umum</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Jawaban untuk pertanyaan yang sering diajukan tentang E-Point</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="mb-6">
                    <button class="w-full text-left bg-white rounded-xl shadow-lg p-6 flex justify-between items-center focus:outline-none">
                        <h3 class="text-lg font-bold text-primary">Apa itu E-Point?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="hidden bg-white rounded-b-xl shadow-lg p-6 border-t border-gray-100">
                        <p class="text-gray-600">E-Point adalah sistem informasi yang dirancang khusus untuk mengelola poin kebaikan dan pelanggaran siswa di sekolah. Sistem ini memudahkan guru, admin, dan orang tua dalam memantau perkembangan siswa.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="mb-6">
                    <button class="w-full text-left bg-white rounded-xl shadow-lg p-6 flex justify-between items-center focus:outline-none">
                        <h3 class="text-lg font-bold text-primary">Bagaimana cara mendaftar sekolah saya?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="hidden bg-white rounded-b-xl shadow-lg p-6 border-t border-gray-100">
                        <p class="text-gray-600">Untuk mendaftar sekolah Anda, silakan hubungi tim kami melalui halaman kontak atau kirim email ke info@epoint.com. Tim kami akan membantu proses pendaftaran dan pelatihan penggunaan sistem.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="mb-6">
                    <button class="w-full text-left bg-white rounded-xl shadow-lg p-6 flex justify-between items-center focus:outline-none">
                        <h3 class="text-lg font-bold text-primary">Apakah E-Point aman untuk data siswa?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="hidden bg-white rounded-b-xl shadow-lg p-6 border-t border-gray-100">
                        <p class="text-gray-600">Ya, E-Point dilengkapi dengan enkripsi data tingkat tinggi dan kontrol akses berbasis peran. Data siswa hanya dapat diakses oleh pihak yang berwenang sesuai dengan peran masing-masing.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="mb-6">
                    <button class="w-full text-left bg-white rounded-xl shadow-lg p-6 flex justify-between items-center focus:outline-none">
                        <h3 class="text-lg font-bold text-primary">Bagaimana orang tua dapat mengakses data anaknya?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="hidden bg-white rounded-b-xl shadow-lg p-6 border-t border-gray-100">
                        <p class="text-gray-600">Orang tua akan mendapatkan akun khusus yang dapat diakses melalui web atau aplikasi mobile. Mereka dapat melihat poin anak, riwayat kebaikan/pelanggaran, dan menerima notifikasi otomatis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-gradient-to-r from-primary to-purple-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Meningkatkan Manajemen Sekolah Anda?</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto text-purple-200">Bergabunglah dengan ratusan sekolah yang telah menggunakan E-Point untuk mengelola poin siswa</p>
            <a href="/register" class="bg-accent text-primary px-8 py-3 rounded-lg font-bold hover:bg-yellow-400 transition-colors duration-300 inline-block">
                Daftar Sekolah Anda
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-accent to-yellow-400 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span class="text-xl font-bold">E-Point</span>
                    </div>
                    <p class="text-gray-400 mb-4 max-w-md">Sistem informasi poin siswa terintegrasi untuk membantu sekolah dalam mengelola kebaikan dan pelanggaran siswa dengan mudah dan transparan.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
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
                            <span class="text-gray-400">Jl. Pendidikan No. 123, Jakarta</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2 text-accent"></i>
                            <span class="text-gray-400">+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-accent"></i>
                            <span class="text-gray-400">info@epoint.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 E-Point. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
    
    // FAQ toggle
    const faqButtons = document.querySelectorAll('#faq button');
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            content.classList.toggle('hidden');
            
            if (content.classList.contains('hidden')) {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            } else {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }
        });
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 80,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobile-menu');
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            }
        });
    });
</script>

</body>
</html>