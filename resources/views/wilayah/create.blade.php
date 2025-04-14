@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Tambah Wilayah</h1>

    <form action="{{ route('wilayah.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block">Nama Wilayah</label>
            <input type="text" name="nama" class="input w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Kode Wilayah</label>
            <input type="text" name="kode" class="input w-full">
        </div>

        <div class="mb-4">
            <label class="block">Keterangan</label>
            <textarea name="keterangan" class="input w-full"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection