@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block">Nama</label>
            <input type="text" name="name" id="name" class="input w-full" value="{{ old('name', $user->name) }}"
                required>
        </div>

        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="input w-full" value="{{ old('email', $user->email) }}"
                required>
        </div>

        <div class="mb-4">
            <label for="password" class="block">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" id="password" class="input w-full">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="input w-full">
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection