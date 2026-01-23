@extends('dashboard.bk.main')

@section('content')

<!-- Header -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">
            Ubah Password
        </h1>
        <a href="{{ route('bk.profil') }}" 
           class="flex items-center gap-2 text-primary hover:text-purple-600 font-semibold transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
</div>

<!-- Error Alert -->
@if ($errors->any())
<div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6">
    <div class="flex items-start gap-3">
        <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
        <div class="flex-1">
            <p class="font-semibold mb-2">Terdapat kesalahan:</p>
            <ul class="text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="flex items-start gap-2">
                        <i class="fas fa-circle text-xs mt-1"></i>
                        <span>{{ $error }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<!-- Form Card -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden max-w-2xl mx-auto">
    
    <form action="{{ route('bk.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="p-8">
            
            <!-- Info Box -->
            <div class="bg-gradient-to-r from-primary/5 to-purple-600/5 border border-primary/20 rounded-xl p-5 mb-8">
                <div class="flex items-start gap-3">
                    <i class="fas fa-info-circle text-primary mt-0.5"></i>
                    <div>
                        <h4 class="font-semibold text-gray-800 mb-1">Tips Keamanan Password</h4>
                        <p class="text-sm text-gray-600">Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol untuk password yang lebih aman.</p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                
                <!-- Password Lama -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        Password Lama <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input
                            type="password"
                            name="current_password"
                            id="current_password"
                            class="w-full pl-11 pr-12 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="Masukkan password lama"
                            required
                        >
                        <button 
                            type="button" 
                            onclick="togglePassword('current_password', 'eye-current')"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary transition-colors"
                        >
                            <i id="eye-current" class="fas fa-eye text-sm"></i>
                        </button>
                    </div>
                </div>

                <!-- Password Baru -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        Password Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="w-full pl-11 pr-12 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="Masukkan password baru"
                            required
                        >
                        <button 
                            type="button" 
                            onclick="togglePassword('password', 'eye-new')"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary transition-colors"
                        >
                            <i id="eye-new" class="fas fa-eye text-sm"></i>
                        </button>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Minimal 8 karakter</p>
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        Konfirmasi Password Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-check-circle text-gray-400"></i>
                        </div>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="w-full pl-11 pr-12 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="Masukkan ulang password baru"
                            required
                        >
                        <button 
                            type="button" 
                            onclick="togglePassword('password_confirmation', 'eye-confirm')"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary transition-colors"
                        >
                            <i id="eye-confirm" class="fas fa-eye text-sm"></i>
                        </button>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Harus sama dengan password baru</p>
                </div>

            </div>

            <!-- Buttons -->
            <div class="mt-8 flex gap-3">
                <a href="{{ route('bk.profil') }}" 
                   class="flex-1 text-center px-6 py-3 border border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button
                    type="submit"
                    class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-primary to-purple-600 hover:from-purple-600 hover:to-primary text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all"
                >
                    <i class="fas fa-save"></i>
                    <span>Simpan Password</span>
                </button>
            </div>

        </div>

    </form>

</div>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>

@endsection