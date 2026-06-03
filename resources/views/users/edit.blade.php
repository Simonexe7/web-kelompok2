    <x-app-layout>

        <x-slot name="header">
            <div class="flex items-center gap-3">
                <a href="{{ route('users.index') }}"
                class="text-blue-600 hover:text-blue-800 text-xl">
                    <i class="fas fa-arrow-left"></i>
                </a>

                <h2 class="font-semibold text-xl text-gray-800">
                    Edit User
                </h2>
            </div>
        </x-slot>

        <div class="bg-white p-6 rounded-lg shadow">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-gray-700">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $user->name }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-gray-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ $user->email }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Role -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700">
                        Role
                    </label>

                    <select
                        name="role"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>
                            Owner
                        </option>

                        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>
                            Manager
                        </option>

                        <option value="supervisor" {{ $user->role == 'supervisor' ? 'selected' : '' }}>
                            Supervisor
                        </option>

                        <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>
                            Kasir
                        </option>

                        <option value="gudang" {{ $user->role == 'gudang' ? 'selected' : '' }}>
                            Gudang
                        </option>

                    </select>
                </div>

                <!-- Tombol -->
                <div class="flex gap-3">
                    <button
                        type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg">
                        Update
                    </button>

                    <a href="{{ route('users.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">
                        Batal
                    </a>
                </div>

            </form>

        </div>

    </x-app-layout>