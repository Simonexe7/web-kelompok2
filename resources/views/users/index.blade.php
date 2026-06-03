    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Management
        </h2>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6">

        <!-- Notifikasi -->
          @if(session('success')) 
         <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"> 
            {{ session('success') }} 
         </div> 
         @endif

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar User</h1>

            <a href="{{ route('users.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah User
            </a>
        </div>

        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Role</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="p-3 border">{{ $user->name }}</td>
                    <td class="p-3 border">{{ $user->email }}</td>
                    <td class="p-3 border">{{ $user->role }}</td>

                    <td class="p-3 border">
                        <div class="flex justify-center gap-2">

                            <a href="{{ route('users.edit', $user->id) }}"
                            class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            <button
                                type="button"
                                onclick="openDeleteModal({{ $user->id }})"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Delete
                            </button>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Modal Delete -->
    <div id="deleteModal"
        class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center">

        <div class="bg-white rounded-lg shadow-xl w-96">

            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800">
                    Konfirmasi Hapus
                </h3>
            </div>

            <div class="p-6">
                <p class="text-gray-700">
                    Apakah Anda yakin ingin menghapus user ini?
                </p>

                <p class="text-sm text-gray-500 mt-2">
                    Data yang dihapus tidak dapat dikembalikan.
                </p>
            </div>

            <div class="px-6 py-4 border-t flex justify-end gap-2">

                <button
                    onclick="closeDeleteModal()"
                    class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">
                    Batal
                </button>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Hapus
                    </button>
                </form>

            </div>

        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = '/users/' + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
    </x-app-layout>
