<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Point SMKN 1 Kawali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .gradient-bg {
            background: linear-gradient(-45deg, #6a4c93 0%, #8b5fbf 25%, #4a69bd 50%, #6c5ce7 75%, #6a4c93 100%);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #6a4c93 0%, #8b5fbf 100%);
            color: white;
            border-radius: 12px 0 0 12px;
        }

        .input-field {
            padding-left: 60px;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(106, 76, 147, 0.2);
        }

        .btn-login {
            background: linear-gradient(135deg, #6a4c93 0%, #8b5fbf 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(106, 76, 147, 0.4);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .logo-container {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .eye-icon {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .eye-icon:hover {
            transform: scale(1.1);
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
        }

        .checkbox-wrapper input[type="checkbox"] {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #6a4c93;
            border-radius: 4px;
            margin-right: 8px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkbox-wrapper input[type="checkbox"]:checked {
            background: linear-gradient(135deg, #6a4c93 0%, #8b5fbf 100%);
        }

        .checkbox-wrapper input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 14px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .image-section {
                display: none;
            }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="glass-effect rounded-3xl shadow-2xl w-full max-w-4xl overflow-hidden login-container flex">
        
        <!-- Login Form Section -->
        <div class="w-full md:w-1/2 p-6 md:p-8">
            <!-- Logo & Header -->
            <div class="text-center mb-6">
                <div class="logo-container inline-block mb-4">
                    <!-- School Logo -->
                    <img src="{{asset('logo/logosmk.png')}}" 
                         alt="Logo SMKN 1 Kawali" 
                         class="w-20 h-20 mx-auto">
                </div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-700 to-blue-600 bg-clip-text text-transparent mb-2">
                    Masuk ke akun Anda
                </h1>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-6 animate-pulse">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                        </svg>
                        <ul class="text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg mb-6 animate-pulse">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                        </svg>
                        <span class="text-sm">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf
                
                <!-- NIS Input -->
                <div class="input-group">
                    <div class="input-icon rounded-l-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="nis" 
                        id="nis" 
                        value="{{ old('nis') }}"
                        class="input-field w-full py-3 pr-4 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:outline-none"
                        placeholder="Nis"
                        required
                        autofocus
                    >
                </div>

                <!-- Password Input -->
                <div class="input-group">
                    <div class="input-icon rounded-l-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="input-field w-full py-3 pr-12 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:outline-none"
                        placeholder="Password"
                        required
                    >
                    <button 
                        type="button" 
                        onclick="togglePassword()"
                        class="eye-icon absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-purple-600"
                    >
                        <svg id="eye-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg id="eye-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex justify-between items-center">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="text-gray-700 cursor-pointer">Ingatkan saya</label>
                    </div>
                    <a href="#" class="text-purple-600 hover:text-purple-800 font-medium transition-colors">Lupa Kata Sandi?</a>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="btn-login w-full text-white py-3 rounded-xl font-semibold text-lg shadow-lg flex items-center justify-center space-x-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    <span>Login</span>
                </button>
            </form>

            <!-- Footer Info -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    © 2025 SMKN 1 Kawali - RPL Tim 2
                </p>
            </div>
        </div>

        <!-- Image Section -->
        <div class="w-full md:w-1/2 image-section relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-700/40 to-purple-800/40"></div>
            <img src="{{asset('logo/smk.jpg')}}" 
                 alt="School Building" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex flex-col justify-end p-6">
                <div class="text-white bg-black/30 backdrop-blur-sm rounded-lg p-4">
                    <h2 class="text-2xl font-bold mb-2">SMKN 1 Kawali</h2>
                    <p class="text-base opacity-90">Membangun Karakter Unggul Melalui Poin Kebaikan</p>
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
    </script>
</body>
</html>