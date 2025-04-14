@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Data Pasien</h2>

<form action="{{ route('pendaftaran.pasien.update', $pasien) }}" method="POST" class="space-y-4 max-w-lg">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Nama Lengkap</label>
        <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama', $pasien->nama) }}">
        @error('nama') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-semibold">NIK</label>
        <input type="text" name="nik" class="w-full border rounded px-3 py-2" value="{{ old('nik', $pasien->nik) }}">
        @error('nik') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-semibold">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="w-full border rounded px-3 py-2"
            value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}">
        @error('tanggal_lahir') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-semibold">Alamat</label>
        <textarea name="alamat" class="w-full border rounded px-3 py-2">{{ old('alamat', $pasien->alamat) }}</textarea>
        @error('alamat') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block font-semibold">Telepon (Opsional)</label>
        <input type="text" name="telepon" class="w-full border rounded px-3 py-2"
            value="{{ old('telepon', $pasien->telepon) }}">
        @error('telepon') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('pendaftaran.pasien.index') }}" class="ml-2 text-gray-600">Kembali</a>
    </div>
</form>
@endsection