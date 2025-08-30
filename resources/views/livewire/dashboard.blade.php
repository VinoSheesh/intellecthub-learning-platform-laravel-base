<div class="w-full h-screen">
    <!-- Greeting -->
    <div class="">
        <h2 class="text-4xl text-gray-600 font-bold">Selamat datang, {{ $user->name }}!</h2>
        <p class="mt-2 text-gray-600">Semoga aktivitas belajarmu menyenangkan.</p>
        <p class="mt-2 text-gray-600">Statusmu Saat Ini adalah {{ $role->name }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow mt-8">
        <div class="flex items-center space-x-3">
            <i class="fa-solid fa-check text-2xl flex items-center justify-center"></i>
            <h2 class="text-xl font-bold flex items-center justify-center">Status Berlangganan</h2>
        </div>
        <div class="w-full mt-4 mb-2 border border-gray-600 bg-gray-100 p-3 rounded-xl flex justify-between items-center">
            {{-- Ambil data subscription aktif --}}
            @php
                $subscription = \App\Models\Subscription::where('user_id', auth()->id())
                    ->where('ends_at', '>=', now())
                    ->orderByDesc('ends_at')
                    ->first();
            @endphp

            @if($subscription)
                <p class="text-gray-600">Status Berlanggananmu <span class="font-bold">Aktif</span> sampai {{ \Carbon\Carbon::parse($subscription->ends_at)->translatedFormat('d F Y') }}</p>
            @else
                <p class="text-gray-600">Status Berlanggananmu <span class="font-bold">Tidak Aktif</span></p>
            @endif

            <a class="bg-gray-700 w-fit h-fit text-white p-2 rounded-md hover:bg-gray-800" href="{{ route('subscriptionplan') }}">Pilih Paket Langganan</a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow mt-7 flex flex-col ">
        <div class="flex items-center space-x-3">
            <i class="fa-solid fa-calendar"></i>
            <h1 class="text-xl font-bold">Aktivitas</h1>
        </div>

        <div class="my-32 flex justify-center">
            <h2 class="text-lg">belum ada Aktivitas</h2>
        </div>
    </div>
</div>
