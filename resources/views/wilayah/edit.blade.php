@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit Wilayah</h1>

    <form action="{{ route('wilayah.update', $wilayah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Nama Wilayah</label>
            <input type="text" name="nama" class="input w-full" value="{{ $wilayah->nama }}" required>
        </div>

        <div class="mb-4">
            <label class="block">Kode Wilayah</label>
            <input type="text" name="kode" class="input w-full" value="{{ $wilayah->kode }}">
        </div>

        <div class="mb-4">
            <label class="block">Keterangan</label>
            <textarea name="keterangan" class="input w-full">{{ $wilayah->keterangan }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection