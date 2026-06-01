<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
        Data Produk
    </h2>
</x-slot>

<section class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

    <!-- HEADER -->
    <header class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                Data Produk
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Kelola produk minimarket
            </p>
        </div>

        <a href="{{ route('barang.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl shadow-sm transition">
            + Tambah
        </a>
    </header>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <!-- HEAD -->
            <thead>
                <tr class="text-left border-b text-gray-500 dark:text-gray-400">
                    <th class="py-3">Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

                @forelse($barangs as $barang)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                    <td class="py-3 font-medium text-gray-800 dark:text-white">
                        {{ $barang->nama }}
                    </td>

                    <td class="text-gray-600 dark:text-gray-300">
                        Rp {{ number_format($barang->harga) }}
                    </td>

                    <!-- STOK BADGE -->
                    <td>
                        <span class="
                            px-2 py-1 text-xs rounded-lg
                            {{ $barang->stok > 10 
                                ? 'bg-green-100 text-green-700' 
                                : ($barang->stok > 0 
                                    ? 'bg-yellow-100 text-yellow-700' 
                                    : 'bg-red-100 text-red-700') }}">
                            
                            {{ $barang->stok }}
                        </span>
                    </td>

                    <!-- ACTION -->
                    <td class="text-right space-x-2">

                        <a href="{{ route('barang.edit', $barang) }}"
                           class="px-3 py-1 text-sm bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('barang.destroy', $barang) }}"
                              class="inline">
                            @csrf
                            @method('DELETE')

                            <button 
                                onclick="return confirm('Hapus barang ini?')"
                                class="px-3 py-1 text-sm bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                Hapus
                            </button>
                        </form>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">
                        Data barang belum ada
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

</section>

</x-app-layout>
