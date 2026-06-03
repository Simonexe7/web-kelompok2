    <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah User</h2>
    </x-slot>

    <div class="bg-white p-6 rounded shadow">

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Nama</label>
                <input type="text" name="name"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Role</label>
                <select name="role"
                    class="w-full border rounded p-2">

                    <option value="owner">Owner</option>
                    <option value="manager">Manager</option>
                    <option value="supervisor">Supervisor</option>
                    <option value="kasir">Kasir</option>
                    <option value="gudang">Gudang</option>

                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan
                </button>

                <a href="{{ route('users.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Batal
                </a>
            </div>
        </form>
    </div>
    </x-app-layout>