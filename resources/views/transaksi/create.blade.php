<x-app-layout>

<x-slot name="header">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
        Transaksi
    </h2>
</x-slot>

<div x-data="posApp()" x-init="init()" class="p-6">

    <div class="grid lg:grid-cols-3 gap-6">

        <!-- LEFT -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow p-6 flex flex-col">

            <!-- SEARCH -->
            <input type="text"
                x-model="search"
                @keydown.enter.prevent="addFirst()"
                placeholder="Scan / cari barang..."
                class="w-full border rounded-xl p-3 mb-4 
                       focus:ring-2 focus:ring-yellow-400 
                       dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                x-ref="searchInput">

            <!-- LIST -->
            <div class="overflow-y-auto space-y-2 max-h-[500px]">

                <template x-for="barang in filteredBarang()" :key="barang.id">
                    <div 
                        @click="addItem(barang)"
                        class="flex justify-between items-center p-3 border rounded-xl 
                               cursor-pointer transition
                               hover:bg-yellow-50 dark:hover:bg-gray-700">

                        <div>
                            <p class="font-medium text-gray-800 dark:text-white"
                               x-text="barang.nama"></p>

                            <p class="text-sm text-gray-500 dark:text-gray-300"
                               x-text="'Rp ' + barang.harga"></p>
                        </div>

                        <span class="text-xs text-gray-400">
                            Stok: <span x-text="barang.stok"></span>
                        </span>
                    </div>
                </template>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 flex flex-col">

            <form method="POST" action="{{ route('transaksi.store') }}" class="flex flex-col h-full">
                @csrf

                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">
                    Keranjang
                </h3>

                <!-- CART -->
                <div class="flex-1 overflow-y-auto space-y-2">

                    <template x-for="(item, index) in cart" :key="item.id">

                        <div class="border rounded-xl p-3 flex justify-between items-center">

                            <div>
                                <p class="font-medium text-gray-800 dark:text-white"
                                   x-text="item.nama"></p>

                                <!-- QTY -->
                                <div class="flex items-center gap-2 mt-2">

                                    <button type="button"
                                        @click="if(item.qty > 1) item.qty--"
                                        class="px-2 bg-gray-200 dark:bg-gray-600 rounded hover:bg-gray-300">
                                        -
                                    </button>

                                    <input type="number"
                                        x-model.number="item.qty"
                                        min="1"
                                        @input="if(!item.qty || item.qty < 1) item.qty = 1"
                                        class="w-12 text-center border rounded
                                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                    <button type="button"
                                        @click="item.qty++"
                                        class="px-2 bg-gray-200 dark:bg-gray-600 rounded hover:bg-gray-300">
                                        +
                                    </button>

                                </div>
                            </div>

                            <div class="text-right">
                                <p class="font-semibold text-gray-800 dark:text-white"
                                   x-text="'Rp ' + (item.qty * item.harga)">
                                </p>

                                <button type="button"
                                    @click="removeItem(index)"
                                    class="text-red-500 text-xs mt-1">
                                    Hapus
                                </button>
                            </div>

                            <!-- hidden -->
                            <input type="hidden" :name="'items['+index+'][barang_id]'" :value="item.id">
                            <input type="hidden" :name="'items['+index+'][qty]'" :value="item.qty">

                        </div>

                    </template>

                </div>

                <!-- TOTAL -->
                <div class="border-t pt-4 mt-4">

                    <div class="flex justify-between text-lg font-semibold text-gray-800 dark:text-white">
                        <span>Total</span>
                        <span x-text="'Rp ' + total"></span>
                    </div>

                    <x-primary-button class="w-full mt-4 justify-center py-2 text-base bg-blue-600 hover:bg-blue-700">
                    {{ __('Bayar') }}
                </x-primary-button>


                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>


<script>
function posApp() {
    return {
        search: '',
        cart: [],
        barangs: @json($barangs),

        init() {
            this.$refs.searchInput.focus();

            // 🔥 ENTER untuk submit kalau cart ada
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' && this.cart.length > 0) {
                    e.preventDefault();
                    document.querySelector('form').submit();
                }
            });
        },

        filteredBarang() {
            return this.barangs.filter(b =>
                b.nama.toLowerCase().includes(this.search.toLowerCase())
            );
        },

        addFirst() {
            let item = this.filteredBarang()[0];
            if (item) this.addItem(item);
        },

        addItem(barang) {
            let existing = this.cart.find(i => i.id === barang.id);

            if (existing) {
                existing.qty++;
            } else {
                this.cart.push({
                    id: barang.id,
                    nama: barang.nama,
                    harga: barang.harga,
                    qty: 1
                });
            }

            this.search = '';
            this.$refs.searchInput.focus();
        },

        removeItem(index) {
            this.cart.splice(index, 1);
        },

        get total() {
            return this.cart.reduce((sum, item) => {
                let qty = item.qty < 1 ? 1 : item.qty;
                return sum + (qty * item.harga);
            }, 0);
        }

    }
}
</script>
