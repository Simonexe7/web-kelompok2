<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Tambah Cabang
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('cabang.store') }}" method="POST" class="space-y-4">

                    @csrf

                    <!-- Nama Cabang -->
                    <div>
                        <label class="block text-sm font-medium">Nama Cabang</label>
                        <input type="text" name="nama_cabang"
                               class="w-full border-gray-300 rounded mt-1"
                               required>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm font-medium">Alamat</label>
                        <textarea name="alamat"
                                  class="w-full border-gray-300 rounded mt-1"
                                  required></textarea>
                    </div>

                    <!-- Telepon -->
                    <div>
                        <label class="block text-sm font-medium">Telepon</label>
                        <input type="text" name="telepon"
                               class="w-full border-gray-300 rounded mt-1"
                               required>
                    </div>

                    <!-- Button -->
                    <div class="flex justify-end space-x-2">

                        <a href="{{ route('cabang.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded">
                            Batal
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded">
                            Simpan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>