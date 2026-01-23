<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Point SMKN 1 Kawali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2B1B64',
                        'primary-light': '#3f2d7a',
                        'primary-dark': '#1e1449',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eaf6 100%);
            min-height: 100vh;
        }

        .glass-effect {
            background: #ffffff;
            box-shadow: 0 4px 24px rgba(43, 27, 100, 0.12);
        }

        .form-section {
            animation: slideInLeft 0.8s ease-out;
        }

        .image-section {
            animation: slideInRight 0.8s ease-out;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2B1B64 0%, #6a4c9c 100%);
            color: white;
            border-radius: 10px 0 0 10px;
            transition: all 0.3s ease;
            pointer-events: none;
            z-index: 1;
        }

        .input-field {
            padding-left: 56px;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(43, 27, 100, 0.15);
            border-color: #2B1B64;
        }

        .input-field:focus ~ .input-icon {
            background: linear-gradient(135deg, #1e1449 0%, #2B1B64 100%);
        }

        .btn-login {
            background: linear-gradient(135deg, #2B1B64 0%, #7c3aed 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(43, 27, 100, 0.3);
            background: linear-gradient(135deg, #1e1449 0%, #6d28d9 100%);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .logo-container {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .eye-icon {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .eye-icon:hover {
            transform: scale(1.1);
            color: #2B1B64;
        }

        .image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(43, 27, 100, 0.85) 0%, rgba(124, 58, 237, 0.75) 100%);
        }

        .school-info {
            animation: fadeIn 1s ease-out 0.3s both;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .image-section {
                display: none;
            }
        }

        /* Logo styling */
        .logo-wrapper {
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eaf6 100%);
            border: 2px solid rgba(43, 27, 100, 0.1);
        }

        /* Header gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #2B1B64 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Divider line */
        .divider-line {
            background: linear-gradient(90deg, transparent 0%, #2B1B64 50%, transparent 100%);
        }

        /* Footer accent */
        .footer-accent {
            background: linear-gradient(135deg, #2B1B64 0%, #7c3aed 100%);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="glass-effect rounded-2xl shadow-2xl w-full max-w-4xl overflow-hidden login-container flex">
        
        <!-- Login Form Section -->
        <div class="w-full md:w-1/2 p-6 md:p-8 form-section">
            <!-- Logo & Header -->
            <div class="text-center mb-6">
                <div class="logo-container inline-block mb-3">
                    <!-- School Logo -->
                    <div class="w-16 h-16 mx-auto logo-wrapper rounded-xl flex items-center justify-center shadow-lg p-2">
                        <img src="{{asset('logo/logosmk.png')}}" 
                             alt="Logo SMKN 1 Kawali" 
                             class="w-full h-full object-contain">
                    </div>
                </div>
                <h1 class="text-xl font-bold gradient-text mb-1">
                    Selamat Datang Kembali
                </h1>
                <p class="text-gray-500 text-xs">Masuk untuk melanjutkan ke E-Point System</p>
                <div class="w-16 h-0.5 divider-line mx-auto mt-3 rounded-full"></div>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 text-red-700 px-3 py-2.5 rounded-lg mb-4">
                    <div class="flex items-start">
                        <svg class="w-4 h-4 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                        </svg>
                        <ul class="text-xs space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 text-green-700 px-3 py-2.5 rounded-lg mb-4">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-xs">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                @csrf
                
                <!-- NIS Input -->
                <div class="input-group">
                    <input 
                        type="text" 
                        name="login_id" 
                        id="login_id" 
                        value="{{ old('login_id') }}"
                        class="input-field w-full py-3 pr-4 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none"
                        placeholder="NIS / NIP"
                        required
                        autofocus
                    >
                    <div class="input-icon rounded-l-xl">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="input-group">
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="input-field w-full py-2.5 pr-10 border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none text-gray-700 text-sm"
                        placeholder="Password"
                        required
                    >
                    <div class="input-icon rounded-l-xl">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <button 
                        type="button" 
                        onclick="togglePassword()"
                        class="eye-icon absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                    >
                        <svg id="eye-open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg id="eye-closed" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="btn-login w-full text-white py-3 rounded-xl font-semibold shadow-lg flex items-center justify-center space-x-2 text-sm"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    <span>Masuk</span>
                </button>
            </form>

            <!-- Footer Info -->
            <div class="mt-6 text-center">
                <div class="w-12 h-0.5 footer-accent mx-auto mb-3 rounded-full"></div>
                <p class="text-xs text-gray-400">
                    © SMKN 1 Kawali 
                </p>
            </div>
        </div>

        <!-- Image Section -->
        <div class="w-full md:w-1/2 image-section relative overflow-hidden">
            <img src="{{asset('logo/smk.jpg')}}" 
                 alt="SMKN 1 Kawali" 
                 class="w-full h-full object-cover">
            <div class="image-overlay"></div>
            <div class="absolute inset-0 flex flex-col justify-end p-8">
                <div class="school-info text-white">
                    <h2 class="text-2xl font-bold mb-2 drop-shadow-lg">SMKN 1 Kawali</h2>
                    <p class="text-base opacity-95 drop-shadow-md mb-3">E-Point System</p>
                    <div class="w-12 h-1 bg-white rounded-full mb-3"></div>
                    <p class="text-xs opacity-90 max-w-sm leading-relaxed">
                        Membangun karakter unggul melalui sistem poin prestasi dan kedisiplinan siswa
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }

        // Add form validation animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
            button.disabled = true;
        });
    </script>
</body>
</html>