<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Data Transaksi
        </h2>
    </x-slot>

    {{-- <div class="py-6" x-data="cabangApp()">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- HEADER ACTION -->
            <div class="flex justify-between items-center mb-4">

                <input type="text"
                       x-model="search"
                       placeholder="Cari cabang..."
                       class="border-gray-300 rounded w-1/2 px-3 py-2">

                <a href="{{ route('cabang.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah Cabang
                </a>

            </div>

            <!-- TABLE -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto">

                        <table class="w-full border border-gray-300">

                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th class="p-2 border">No</th>
                                    <th class="p-2 border">Nama Cabang</th>
                                    <th class="p-2 border">Alamat</th>
                                    <th class="p-2 border">Telepon</th>
                                    <th class="p-2 border">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <template x-for="(item, index) in filteredCabang" :key="item.id">

                                    <tr class="border-t">
                                        <td class="p-2 border" x-text="index + 1"></td>
                                        <td class="p-2 border" x-text="item.nama_cabang"></td>
                                        <td class="p-2 border" x-text="item.alamat"></td>
                                        <td class="p-2 border" x-text="item.telepon"></td>

                                        <td class="p-2 border space-x-2">

                                            <a :href="`/cabang/${item.id}/edit`"
                                               class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                                                Edit
                                            </a>

                                            <form :action="`/cabang/${item.id}`"
                                                  method="POST"
                                                  class="inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="bg-red-600 text-white px-2 py-1 rounded text-sm"
                                                        onclick="return confirm('Hapus data ini?')">
                                                    Hapus
                                                </button>

                                            </form>

                                        </td>
                                    </tr>

                                </template>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div> --}}

    @foreach($barangs as $barang)
        <p>{{ $barang->nama }} - {{ $barang->harga }}</p>
    @endforeach


    <!-- ALPINE -->
    <script>
        function cabangApp() {
            return {
                search: '',
                cabang: @json($cabang),

                get filteredCabang() {
                    return this.cabang.filter(item => {
                        return (
                            item.nama_cabang.toLowerCase().includes(this.search.toLowerCase()) ||
                            item.alamat.toLowerCase().includes(this.search.toLowerCase())
                        );
                    });
                }
            }
        }
    </script>

</x-app-layout>