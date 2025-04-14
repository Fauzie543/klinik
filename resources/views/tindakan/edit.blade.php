@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Edit Tindakan</h1>

    <form action="{{ route('tindakan.update', $tindakan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Nama Tindakan</label>
            <input type="text" name="nama" class="input w-full" value="{{ $tindakan->nama }}" required>
        </div>

        <div class="mb-4">
            <label class="block">Deskripsi</label>
            <textarea name="deskripsi" class="input w-full">{{ $tindakan->deskripsi }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block">Tarif (Rp)</label>
            <input type="number" name="tarif" class="input w-full" value="{{ $tindakan->tarif }}" step="1000" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection