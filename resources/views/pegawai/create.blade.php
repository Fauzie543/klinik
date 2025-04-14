@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Tambah Pegawai</h1>

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block">Nama</label>
            <input type="text" name="nama" id="nama" class="input w-full" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-4">
            <label for="jabatan" class="block">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="input w-full" value="{{ old('jabatan') }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="input w-full" value="{{ old('email') }}" required>
        </div>

        <div class="mb-4">
            <label for="telepon" class="block">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="input w-full" value="{{ old('telepon') }}" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection