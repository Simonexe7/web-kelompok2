<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
        Laporan Penjualan
    </h2>
</x-slot>

<section class="w-full bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

    <!-- HEADER -->
    <header>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Filter dan lihat data transaksi berdasarkan periode tertentu
        </p>
    </header>

    <!-- FORM FILTER -->
    <form method="GET" class="mt-6 space-y-6">

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- DARI -->
            <div>
                <x-input-label for="dari" :value="__('Dari Tanggal')" />

                <input type="date" name="dari" id="dari"
                    value="{{ request('dari') }}"
                    class="mt-1 block w-full rounded-xl border-gray-300 
                           focus:ring-yellow-400 focus:border-yellow-400
                           dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <!-- SAMPAI -->
            <div>
                <x-input-label for="sampai" :value="__('Sampai Tanggal')" />

                <input type="date" name="sampai" id="sampai"
                    value="{{ request('sampai') }}"
                    class="mt-1 block w-full rounded-xl border-gray-300 
                           focus:ring-yellow-400 focus:border-yellow-400
                           dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

        </div>

        <!-- ACTION -->
        <div class="flex justify-between">
            <div class="flex items-center gap-4">

                <x-primary-button class="bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-400">
                    Filter
                </x-primary-button>

                <a href="{{ route('laporan.index') }}"
                class="text-sm text-gray-500 hover:text-gray-700">
                    Reset
                </a>

            </div>

            <a href="{{ route('laporan.export', request()->query()) }}"
                class="px-4 py-2 bg-green-500 text-white rounded-xl hover:bg-green-600">
                Export Excel
            </a>
        </div>

    </form>

    <!-- SUMMARY -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl">
            <p class="text-sm text-gray-500">Total Penjualan</p>
            <p class="text-xl font-semibold text-gray-800 dark:text-white">
                Rp {{ number_format($total) }}
            </p>
        </div>

        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl">
            <p class="text-sm text-gray-500">Jumlah Transaksi</p>
            <p class="text-xl font-semibold text-gray-800 dark:text-white">
                {{ $jumlah }}
            </p>
        </div>

    </div>

    <!-- LIST -->
    <div class="mt-6 space-y-3">

        @forelse($transaksis as $trx)
        <a href="{{ route('laporan.show', $trx->id) }}"
            class="border rounded-xl p-4 flex justify-between items-center
                    hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                <div>
                    <p class="font-medium text-gray-800 dark:text-white">
                        Transaksi #{{ $trx->id }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $trx->created_at->format('d M Y H:i') }}
                    </p>
                </div>

                <p class="font-semibold text-gray-800 dark:text-white">
                    Rp {{ number_format($trx->total) }}
                </p>

            </a>

        @empty
        <p class="text-gray-500 text-center mt-6">
            Belum ada transaksi
        </p>
        @endforelse

    </div>

</section>

</x-app-layout>
