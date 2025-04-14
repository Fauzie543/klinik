@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit Pegawai</h1>

    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block">Nama</label>
            <input type="text" name="nama" id="nama" class="input w-full" value="{{ old('nama', $pegawai->nama) }}"
                required>
        </div>

        <div class="mb-4">
            <label for="jabatan" class="block">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="input w-full"
                value="{{ old('jabatan', $pegawai->jabatan) }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="input w-full" value="{{ old('email', $pegawai->email) }}"
                required>
        </div>

        <div class="mb-4">
            <label for="telepon" class="block">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="input w-full"
                value="{{ old('telepon', $pegawai->telepon) }}" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection