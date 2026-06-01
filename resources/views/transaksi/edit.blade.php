<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Edit Cabang
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('cabang.update', $cabang->id) }}" method="POST" class="space-y-4">

                    @csrf
                    @method('PUT')

                    <!-- Nama Cabang -->
                    <div>
                        <label class="block text-sm font-medium">Nama Cabang</label>
                        <input type="text" name="nama_cabang"
                               value="{{ $cabang->nama_cabang }}"
                               class="w-full border-gray-300 rounded mt-1"
                               required>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm font-medium">Alamat</label>
                        <textarea name="alamat"
                                  class="w-full border-gray-300 rounded mt-1"
                                  required>{{ $cabang->alamat }}</textarea>
                    </div>

                    <!-- Telepon -->
                    <div>
                        <label class="block text-sm font-medium">Telepon</label>
                        <input type="text" name="telepon"
                               value="{{ $cabang->telepon }}"
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
                                class="px-4 py-2 bg-yellow-500 text-white rounded">
                            Update
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>