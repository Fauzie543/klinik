@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit Obat</h1>

    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Nama Obat</label>
            <input type="text" name="nama" class="input w-full" value="{{ $obat->nama }}" required>
        </div>

        <div class="mb-4">
            <label class="block">Satuan</label>
            <input type="text" name="satuan" class="input w-full" value="{{ $obat->satuan }}" required>
        </div>

        <div class="mb-4">
            <label class="block">Stok</label>
            <input type="number" name="stok" class="input w-full" value="{{ $obat->stok }}" required>
        </div>

        <div class="mb-4">
            <label class="block">Harga</label>
            <input type="number" name="harga" class="input w-full" value="{{ $obat->harga }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection