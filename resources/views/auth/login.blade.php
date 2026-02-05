<x-guest-layout>
    <div class="min-h-screen flex bg-white">
        <!-- Left Side - Login Form -->
        <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-20 xl:px-24">
            <div class="max-w-md w-full space-y-8">
                <!-- Logo and Header -->
                <div>
                    <div class="flex items-center mb-8">
                        <div class="h-10 w-10 bg-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="ml-3 text-xl font-semibold text-gray-900" style="font-family: 'Poppins', sans-serif;">IntellectHub</span>
                    </div>
                    
                    <h2 class="text-3xl font-bold text-gray-900 mb-2" style="font-family: 'Poppins', sans-serif;">
                        Login ke akun Anda
                    </h2>
                    <p class="text-sm text-gray-500" style="font-family: 'Poppins', sans-serif;">
                        Masukkan email dan password Anda untuk login
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus 
                                autocomplete="username"
                                placeholder="Masukkan email Anda"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 text-gray-900 placeholder-gray-400"
                                style="font-family: 'Poppins', sans-serif;" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input id="password" 
                                type="password"
                                name="password"
                                required 
                                autocomplete="current-password"
                                placeholder="Masukkan password Anda"
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 text-gray-900 placeholder-gray-400"
                                style="font-family: 'Poppins', sans-serif;" />
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center cursor-pointer">
                            <input id="remember_me" 
                                type="checkbox" 
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600" 
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600" style="font-family: 'Poppins', sans-serif;">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200" 
                               href="{{ route('password.request') }}"
                               style="font-family: 'Poppins', sans-serif;">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit" 
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition-all duration-200"
                        style="font-family: 'Poppins', sans-serif;">
                        Login
                    </button>
                </form>

                <!-- Sign Up Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600" style="font-family: 'Poppins', sans-serif;">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors duration-200">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side - Image Area -->
        <div class="hidden lg:block relative w-0 flex-1 bg-blue-600">
            <div class="absolute inset-0 flex items-center justify-center p-12">
                <!-- Area untuk gambar Anda - kosongkan agar bisa diisi sendiri -->
                <div class="w-full h-full flex items-center justify-center">
                    <!-- Anda bisa menambahkan gambar di sini -->
                    <!-- Contoh: <img src="path/to/your/image.png" alt="IntellectHub" class="max-w-full max-h-full object-contain"> -->
                    
                    <!-- Placeholder text (hapus saat menambahkan gambar) -->
                    <div class="text-center">
                        <h3 class="text-4xl font-bold text-white mb-4" style="font-family: 'Poppins', sans-serif;">
                            Selamat Datang di IntellectHub
                        </h3>
                        <p class="text-xl text-blue-100" style="font-family: 'Poppins', sans-serif;">
                            Platform Pembelajaran Terbaik
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Smooth transitions */
        input:focus {
            transform: translateY(-1px);
        }
        
        button[type="submit"]:active {
            transform: scale(0.98);
        }
        
        /* Custom scrollbar untuk browser yang mendukung */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #2563eb;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #1d4ed8;
        }
    </style>
</x-guest-layout>