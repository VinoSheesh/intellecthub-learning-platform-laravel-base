<div class="max-w-5xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center mb-10">Langganan Plus</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Paket 1 Bulan --}}
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-6 border text-center">
            <h2 class="text-lg font-semibold mb-2">Langganan 1 bulan (30 hari)</h2>
            <p class="text-2xl font-bold mb-4">Rp 1,500,000</p>
            <button wire:click="pay('1_month', 1500000)"
                class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900">
                Pilih paket
            </button>
        </div>

        {{-- Paket 3 Bulan --}}
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-6 border text-center">
            <h2 class="text-lg font-semibold mb-2">Langganan 3 bulan (90 hari)</h2>
            <p class="text-2xl font-bold mb-4">Rp 4,500,000</p>
            <button wire:click="pay('3_month', 4500000)"
                class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900">
                Pilih paket
            </button>
        </div>

        {{-- Paket 6 Bulan --}}
        <div class="relative bg-white dark:bg-gray-800 shadow-md rounded-2xl p-6 border text-center">
            <span
                class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-cyan-400 text-white text-xs font-semibold px-3 py-1 rounded-full">Hemat
                10%</span>

            <h2 class="text-lg font-semibold mb-2">Langganan 6 bulan (180 hari)</h2>
            <p class="line-through text-gray-400">Rp 9,000,000</p>
            <p class="text-2xl font-bold mb-4">Rp 8,100,000</p>
            <button wire:click="pay('6_month', 8100000)"
                class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900">
                Pilih paket
            </button>
        </div>

        {{-- Paket 1 Tahun --}}
        <div class="relative bg-white dark:bg-gray-800 shadow-md rounded-2xl p-6 border text-center">
            <span
                class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-cyan-400 text-white text-xs font-semibold px-3 py-1 rounded-full">Hemat
                30%</span>

            <h2 class="text-lg font-semibold mb-2">Langganan 1 tahun (365 hari)</h2>
            <p class="line-through text-gray-400">Rp 18,000,000</p>
            <p class="text-2xl font-bold mb-4">Rp 12,600,000</p>
            <button wire:click="pay('1_year', 12600000)"
                class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900">
                Pilih paket
            </button>
        </div>
    </div>
</div>
