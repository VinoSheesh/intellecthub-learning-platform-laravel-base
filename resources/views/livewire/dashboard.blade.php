<div class="w-full h-screen font-poppins bg-white dark:bg-gray-900">
    <!-- Greeting -->
    <div class="">
        <h1 class="text-4xl text-gray-900 font-bold">Selamat datang, {{ $user->name }}👋</h1>
        <p class="mt-2 text-gray-600">Semoga aktivitas belajarmu menyenangkan.</p>
    </div>

    <div class=" text-gray-900 p-6 rounded-3xl shadow mt-8">
        <div class="flex items-center space-x-3">
            <i class="fa-solid fa-check text-2xl flex items-center justify-center"></i>
            <h2 class="text-xl font-bold flex items-center justify-center">Status Berlangganan</h2>
        </div>
        <div
            class="w-full mt-4 mb-2 border border-gray-600 bg-gray-100 p-3 rounded-xl flex justify-between items-center">
            <div>
                @if ($subscription)
                    <p class="text-gray-600">
                        Status Berlanggananmu <span class="font-bold text-green-500">Aktif</span><br>
                        <span class="text-sm">Anda berlangganan sampai
                            {{ Carbon\Carbon::parse($subscription->ends_at)->translatedFormat('d F Y') }}</span>
                    </p>
                @else
                    <p class="text-gray-600">Status Berlanggananmu <span class="font-bold">Tidak Aktif</span></p>
                @endif
            </div>

            @if (!$subscription)
                <a class="bg-gray-700 w-fit h-fit text-white p-2 rounded-md hover:bg-gray-800"
                    href="{{ route('subscriptionplan') }}">
                    {{ $subscription ? 'Perpanjang Langganan' : 'Pilih Paket Langganan' }}
                </a>
            @endif
        </div>
    </div>

    <div class="text-gray-900 p-6 rounded-3xl shadow mt-7 flex flex-col ">
        <div class="flex items-center space-x-3">
            <i class="fa-solid fa-calendar"></i>
            <h1 class="text-xl font-bold">Aktivitas</h1>
        </div>

        <div class="my-32 flex justify-center">
            <div>
                <canvas id="myChart"></canvas>
            </div>

        </div>
    </div>

    @if (session()->has('success'))
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
