{{-- filepath: d:\Project Coding\intellecthub\resources\views\livewire\subscription-transaction.blade.php --}}
<div class="max-w-lg mx-auto mt-10 bg-white dark:bg-gray-800 rounded-xl shadow p-8">
    <h2 class="text-xl font-bold mb-6">Konfirmasi Pembayaran</h2>
    <div class="mb-4">
        <div class="flex justify-between mb-2">
            <span class="font-semibold">Paket</span>
            <span>
                @php
                    $plan = session('plan');
                    $planLabel =
                        [
                            '1_month' => 'Langganan 1 Bulan',
                            '3_month' => 'Langganan 3 Bulan',
                            '6_month' => 'Langganan 6 Bulan',
                            '1_year' => 'Langganan 1 Tahun',
                        ][$plan] ?? '-';
                @endphp
                {{ $planLabel }}
            </span>
        </div>
        <div class="flex justify-between mb-2">
            <span class="font-semibold">Harga</span>
            <span>Rp {{ number_format(session('price'), 0, ',', '.') }}</span>
        </div>
        <hr class="my-2">
        <div class="flex justify-between text-lg font-bold">
            <span>Total Bayar</span>
            <span>Rp {{ number_format(session('price'), 0, ',', '.') }}</span>
        </div>
    </div>

    <button wire:click="showSnap"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold mt-4">
        Bayar Sekarang
    </button>
    <div id="snap-container"></div>
    <div>Snap Token: {{ session('snap_token') }}</div>
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
                        Livewire.dispatch('paymentSuccess', result);
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
