<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="min-h-screen bg-slate-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <!-- Logo/Brand Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-sky-100 rounded-2xl mb-4 transform hover:scale-105 transition-transform duration-300">
                <svg class="w-8 h-8 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Login ke IntellectHub</h1>
            <p class="text-slate-600">Masukkan email dan password Anda untuk melanjutkan</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden transform hover:shadow-2xl transition-shadow duration-300">
            <div class="px-8 py-8">
                <!-- Session Status -->
                <x-auth-session-status class="text-center mb-6" :status="session('status')" />

                <form method="POST" wire:submit="login" class="space-y-6">
                    <!-- Email Address -->
                    <div class="group">
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                            {{ __('Email address') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-sky-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input
                                wire:model="email"
                                type="email"
                                id="email"
                                required
                                autofocus
                                autocomplete="email"
                                placeholder="email@example.com"
                                class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-xl bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all duration-200 hover:border-slate-400"
                            />
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="group">
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-medium text-slate-700">
                                {{ __('Password') }}
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   wire:navigate 
                                   class="text-sm text-sky-600 hover:text-sky-700 font-medium transition-colors duration-200">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-sky-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input
                                wire:model="password"
                                type="password"
                                id="password"
                                required
                                autocomplete="current-password"
                                placeholder="{{ __('Password') }}"
                                class="block w-full pl-10 pr-10 py-3 border border-slate-300 rounded-xl bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all duration-200 hover:border-slate-400"
                            />
                            <!-- Password visibility toggle would go here if needed -->
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input
                            wire:model="remember"
                            type="checkbox"
                            id="remember"
                            class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-slate-300 rounded transition-colors duration-200"
                        />
                        <label for="remember" class="ml-3 text-sm text-slate-700 cursor-pointer hover:text-slate-900 transition-colors duration-200">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 shadow-lg hover:shadow-xl"
                    >
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-sky-500 group-hover:text-sky-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                        </span>
                        {{ __('Log in') }}
                    </button>
                </form>
            </div>

            <!-- Bottom Section -->
            @if (Route::has('register'))
                <div class="px-8 py-6 bg-slate-50 border-t border-slate-200">
                    <div class="text-center">
                        <p class="text-sm text-slate-600">
                            {{ __('Belum punya akun?') }}
                            <a href="{{ route('register') }}" 
                               wire:navigate 
                               class="font-medium text-sky-600 hover:text-sky-700 transition-colors duration-200 hover:underline">
                                {{ __('Daftar sekarang') }}
                            </a>
                        </p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Additional Info -->
        <div class="mt-8 text-center">
            <p class="text-xs text-slate-500">
                Dengan masuk, Anda menyetujui 
                <a href="#" class="text-sky-600 hover:text-sky-700 transition-colors duration-200">Syarat & Ketentuan</a> 
                dan 
                <a href="#" class="text-sky-600 hover:text-sky-700 transition-colors duration-200">Kebijakan Privasi</a> 
                kami.
            </p>
        </div>
    </div>
</div>

<style>
/* Custom animations and hover effects */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.group:focus-within input {
    transform: translateY(-1px);
}

/* Loading state animation for button */
.group:active button {
    transform: scale(0.98);
}

/* Subtle pulse animation for the logo */
@keyframes pulse-soft {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.animate-pulse-soft {
    animation: pulse-soft 3s ease-in-out infinite;
}
</style>

<script>
// Add some interactive behaviors
document.addEventListener('DOMContentLoaded', function() {
    // Add fade-in animation to the form
    const form = document.querySelector('form');
    if (form) {
        form.style.animation = 'fadeIn 0.6s ease-out';
    }

    // Add focus enhancement to inputs
    const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
            this.parentElement.style.transition = 'transform 0.2s ease';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });

    // Add floating label effect
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            const label = this.parentElement.parentElement.querySelector('label');
            if (this.value) {
                label.style.transform = 'translateY(-6px) scale(0.9)';
                label.style.color = '#0ea5e9';
            } else {
                label.style.transform = 'translateY(0) scale(1)';
                label.style.color = '#374151';
            }
        });
    });
});</script>