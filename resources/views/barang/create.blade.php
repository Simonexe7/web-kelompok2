<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
        Tambah Produk
    </h2>
</x-slot>

<section class="w-full bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

    <!-- HEADER -->
    <header>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Tambahkan produk baru ke dalam sistem
        </p>
    </header>

    <!-- FORM -->
    <form method="POST" action="{{ route('barang.store') }}" class="mt-6 space-y-6">
        @csrf

        <!-- NAMA -->
        <div>
            <x-input-label for="nama" :value="__('Nama Produk')" />

            <x-text-input 
                id="nama" 
                name="nama" 
                type="text"
                class="mt-1 block w-full rounded-xl border-gray-300 
                       focus:ring-yellow-400 focus:border-yellow-400
                       dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                :value="old('nama')" 
                required 
                autofocus 
            />

            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>

        <!-- HARGA -->
        <div>
            <x-input-label for="harga" :value="__('Harga')" />

            <x-text-input 
                id="harga" 
                name="harga" 
                type="number"
                class="mt-1 block w-full rounded-xl border-gray-300 
                       focus:ring-yellow-400 focus:border-yellow-400
                       dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                :value="old('harga')" 
                required 
            />

            <x-input-error class="mt-2" :messages="$errors->get('harga')" />
        </div>

        <!-- STOK -->
        <div>
            <x-input-label for="stok" :value="__('Stok')" />

            <x-text-input 
                id="stok" 
                name="stok" 
                type="number"
                class="mt-1 block w-full rounded-xl border-gray-300 
                       focus:ring-yellow-400 focus:border-yellow-400
                       dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                :value="old('stok', 0)" 
                required 
            />

            <x-input-error class="mt-2" :messages="$errors->get('stok')" />
        </div>

        <!-- ACTION -->
        <div class="flex items-center gap-4">

            <x-primary-button class="bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-400">
                Simpan
            </x-primary-button>

            <a href="{{ route('barang.index') }}"
               class="text-sm text-gray-500 hover:text-gray-700">
                Batal
            </a>

        </div>

    </form>

</section>

</x-app-layout>
