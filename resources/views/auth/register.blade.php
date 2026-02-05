<x-guest-layout>
    <div class="min-h-screen flex bg-white">
        <!-- Left Side - Register Form -->
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
                        Buat akun baru
                    </h2>
                    <p class="text-sm text-gray-500" style="font-family: 'Poppins', sans-serif;">
                        Bergabunglah dengan komunitas pembelajaran kami
                    </p>
                </div>

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">
                            Nama Lengkap
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input id="name" 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="Masukkan nama lengkap Anda"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 text-gray-900 placeholder-gray-400"
                                style="font-family: 'Poppins', sans-serif;" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

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
                                autocomplete="username"
                                placeholder="Masukkan alamat email Anda"
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
                                autocomplete="new-password"
                                placeholder="Masukkan password Anda"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 text-gray-900 placeholder-gray-400"
                                style="font-family: 'Poppins', sans-serif;" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Poppins', sans-serif;">
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input id="password_confirmation" 
                                type="password"
                                name="password_confirmation"
                                required 
                                autocomplete="new-password"
                                placeholder="Konfirmasi password Anda"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 text-gray-900 placeholder-gray-400"
                                style="font-family: 'Poppins', sans-serif;" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Terms and Privacy -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" 
                                type="checkbox" 
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600" 
                                required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-600" style="font-family: 'Poppins', sans-serif;">
                                Saya menyetujui 
                                <a href="#" class="text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                                    Syarat & Ketentuan
                                </a> 
                                dan 
                                <a href="#" class="text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                                    Kebijakan Privasi
                                </a>
                            </label>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" 
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition-all duration-200"
                        style="font-family: 'Poppins', sans-serif;">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Daftar ke IntellectHub
                    </button>
                </form>

                <!-- Sign In Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600" style="font-family: 'Poppins', sans-serif;">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors duration-200">
                            Masuk sekarang
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
                            Bergabung dengan IntellectHub
                        </h3>
                        <p class="text-xl text-blue-100" style="font-family: 'Poppins', sans-serif;">
                            Mulai perjalanan pembelajaran Anda
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

        /* Checkbox custom styling */
        input[type="checkbox"]:checked {
            background-color: #2563eb;
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='m13.854 3.646-7.5 7.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6 10.293l7.146-7.147a.5.5 0 0 1 .708.708z'/%3e%3c/svg%3e");
        }
    </style>
</x-guest-layout>