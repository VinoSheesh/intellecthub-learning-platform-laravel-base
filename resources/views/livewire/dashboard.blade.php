<div class="w-full h-screen">
    <!-- Greeting -->
    <div class="p-6">
        <h2 class="text-4xl font-bold">Selamat datang, {{ $user->name }}!</h2>
        <p class="mt-2 text-gray-600">Semoga aktivitas belajarmu menyenangkan.</p>
        <p class="mt-2 text-gray-600">Statusmu Saat Ini adalah {{ $role->name }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center space-x-3">
            <i class="fa-solid fa-check text-2xl flex items-center justify-center"></i>
            <h2 class="text-xl font-bold flex items-center justify-center">Status Berlangganan</h2>
        </div>
        <div class="w-full mt-4 mb-2 border border-gray-600 bg-gray-100 p-3 rounded-xl flex justify-between items-center">
            <p class="text-gray-600">Status Berlanggananmu <span class="font-bold">Tidak Aktif</span></p>
            <button class="bg-gray-700 w-fit h-fit text-white p-2 rounded-md hover:bg-gray-800">Pilih Paket Langganan</button>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow mt-7">
        <div class="flex items-center space-x-3">
            <i class="fa-solid fa-calendar"></i>
            <h1 class="text-xl font-bold">Aktivitas</h1>
        </div>
    </div>
</div>
