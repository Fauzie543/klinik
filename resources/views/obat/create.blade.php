@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Tambah Obat</h1>

    <form action="{{ route('obat.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block">Nama Obat</label>
            <input type="text" name="nama" class="input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Satuan</label>
            <input type="text" name="satuan" class="input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Stok</label>
            <input type="number" name="stok" class="input w-full" min="0" required>
        </div>

        <div class="mb-4">
            <label class="block">Harga</label>
            <input type="number" name="harga" class="input w-full" min="0" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection