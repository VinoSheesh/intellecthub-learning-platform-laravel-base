<div class="min-h-screen bg-white px-4 sm:px-6 lg:px-8 font-poppins">
    <div class="max-w-md mx-auto">
        {{-- Updated icon background with more vibrant colors --}}
        <div class="flex justify-center mb-8">
            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
            </div>
        </div>

        {{-- Enhanced card shadow and border for better depth on white background --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            {{-- Improved text contrast with darker colors --}}
            <div class="px-6 py-6 border-b border-gray-200 bg-gradient-to-b from-gray-50 to-white">
                <h2 class="text-3xl font-bold text-gray-900 text-center">Konfirmasi Pembayaran</h2>
                <p class="text-sm text-gray-600 text-center mt-2">Periksa detail transaksi Anda sebelum melanjutkan</p>
            </div>

            {{-- Enhanced transaction details box with better contrast --}}
            <div class="px-6 py-6 space-y-4">
                <div class="bg-gray-50 rounded-xl p-4 space-y-4 border border-gray-200">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-semibold text-gray-700">Paket Langganan</span>
                        <span class="text-sm font-bold text-gray-900">
                            @php
                                $plan = session('plan');
                                $planLabel = [
                                    '1_month' => 'Langganan 1 Bulan',
                                    '3_month' => 'Langganan 3 Bulan',
                                    '6_month' => 'Langganan 6 Bulan',
                                    '1_year' => 'Langganan 1 Tahun'
                                ][$plan] ?? '-';
                            @endphp
                            {{ $planLabel }}
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-semibold text-gray-700">Harga</span>
                        <span class="text-sm font-bold text-gray-900">Rp {{ number_format(session('price'), 0, ',', '.') }}</span>
                    </div>

                    <div class="pt-4 border-t border-gray-300">
                        <div class="flex justify-between items-center">
                            <span class="text-base font-bold text-gray-900">Total Pembayaran</span>
                            <span class="text-xl font-bold text-blue-600">Rp {{ number_format(session('price'), 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Updated button styles for better visibility on white background --}}
            <div class="px-6 pb-6 space-y-3">
                <button 
                    wire:click="showSnap"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 px-4 rounded-xl transition-all duration-200 ease-in-out transform hover:scale-[1.02] hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Konfirmasi & Bayar
                    </span>
                </button>

                <a 
                    href="{{ route('dashboard') }}"
                    class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-4 rounded-xl transition-all duration-200 ease-in-out flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-gray-300 border border-gray-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Batal
                </a>
            </div>

            {{-- Enhanced security badge with better contrast --}}
            <div class="px-6 pb-6">
                <div class="flex items-center justify-center gap-2 text-xs text-gray-600 bg-gray-50 py-3 rounded-lg border border-gray-200">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span class="font-medium">Pembayaran aman dengan Midtrans</span>
                </div>
            </div>
        </div>
    </div>
    
    <div id="snap-container"></div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('showSnap', () => {
            let snapToken = @json(session('snap_token'));
            if (snapToken) {
                window.snap.pay(snapToken, {
                    onSuccess: function(result) {
                        Livewire.dispatch('paymentSuccess');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Pembayaran berhasil, anda telah berlangganan!',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            window.location.href = '{{ route("dashboard") }}';
                        });
                    },
                    onPending: function(result) {
                        Livewire.dispatch('paymentPending', result);
                    },
                    onError: function(result) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Pembayaran gagal!'
                        });
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Token pembayaran tidak ditemukan!'
                });
            }
        });
    });
</script>
