<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
        Detail Transaksi #{{ $transaksi->id }}
    </h2>
</x-slot>

<section class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

    <!-- INFO -->
    <header>
        <p class="text-sm text-gray-500">
            Tanggal: {{ $transaksi->created_at->format('d M Y H:i') }}
        </p>
    </header>

    <!-- LIST BARANG -->
    <div class="mt-6 space-y-3">

        @foreach($transaksi->details as $detail)
        <div class="flex justify-between items-center border p-3 rounded-xl">

            <div>
                <p class="font-medium text-gray-800 dark:text-white">
                    {{ $detail->barang->nama }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ $detail->qty }} x Rp {{ number_format($detail->harga) }}
                </p>
            </div>

            <p class="font-semibold text-gray-800 dark:text-white">
                Rp {{ number_format($detail->subtotal) }}
            </p>

        </div>
        @endforeach

    </div>

    <!-- TOTAL -->
    <div class="mt-6 border-t pt-4 flex justify-between text-lg font-semibold dark:text-white">
        <span>Total</span>
        <span>Rp {{ number_format($transaksi->total) }}</span>
    </div>

    <!-- BACK -->
    <div class="mt-6">
        <a href="{{ route('laporan.index') }}"
           class="text-sm text-gray-500 hover:text-gray-700">
            ← Kembali ke laporan
        </a>
    </div>

</section>

</x-app-layout>
