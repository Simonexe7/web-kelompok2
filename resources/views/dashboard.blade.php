<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- Barang -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-gray-500 text-sm">
                Total Barang
            </p>

            <h3 class="text-3xl font-bold mt-2">
                {{ $jumlahBarang }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-gray-500 text-sm">
                Total Cabang
            </p>

            <h3 class="text-3xl font-bold mt-2">
                {{ $jumlahCabang }}
            </h3>
        </div>

        <!-- Transaksi -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-gray-500 text-sm">
                Total Transaksi
            </p>

            <h3 class="text-3xl font-bold mt-2">
                {{ $jumlahTransaksi }}
            </h3>
        </div>

        <!-- User -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-gray-500 text-sm">
                Total User
            </p>

            <h3 class="text-3xl font-bold mt-2">
                {{ $jumlahUser }}
            </h3>
        </div>

    </div>
</x-app-layout>
