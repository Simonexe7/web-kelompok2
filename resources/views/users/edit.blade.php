<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">Edit User</h2>
</x-slot>

<div class="bg-white p-6 rounded shadow">

<form action="{{ route('users.update',$user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Nama</label>
        <input type="text"
            name="name"
            value="{{ $user->name }}"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Email</label>
        <input type="email"
            name="email"
            value="{{ $user->email }}"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Role</label>

        <select name="role"
            class="w-full border rounded p-2">

            <option value="owner" {{ $user->role=='owner'?'selected':'' }}>Owner</option>
            <option value="manager" {{ $user->role=='manager'?'selected':'' }}>Manager</option>
            <option value="supervisor" {{ $user->role=='supervisor'?'selected':'' }}>Supervisor</option>
            <option value="kasir" {{ $user->role=='kasir'?'selected':'' }}>Kasir</option>
            <option value="gudang" {{ $user->role=='gudang'?'selected':'' }}>Gudang</option>

        </select>
    </div>

    <button type="submit"
        class="bg-yellow-500 text-white px-4 py-2 rounded">
        Update
    </button>

</form>

</div>

</x-app-layout>