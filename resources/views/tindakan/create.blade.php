@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Tambah Tindakan</h1>

    <form action="{{ route('tindakan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block">Nama Tindakan</label>
            <input type="text" name="nama" class="input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Deskripsi</label>
            <textarea name="deskripsi" class="input w-full"></textarea>
        </div>

        <div class="mb-4">
            <label class="block">Tarif (Rp)</label>
            <input type="number" name="tarif" class="input w-full" min="0" step="1000" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection