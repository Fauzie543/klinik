@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">{{ isset($wilayah) ? 'Edit' : 'Tambah' }} Wilayah</h1>
    <form action="{{ isset($wilayah) ? route('wilayah.update', $wilayah->id) : route('wilayah.store') }}" method="POST">
        @csrf
        @if(isset($wilayah)) @method('PUT') @endif

        <div class="mb-4">
            <label class="block font-semibold">Nama Wilayah</label>
            <input type="text" name="nama" value="{{ old('nama', $wilayah->nama ?? '') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('wilayah.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection