@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Detail Pasien</h2>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4 border">
        <div>
            <p class="text-gray-600 text-sm">Nama Lengkap</p>
            <p class="text-lg font-semibold">{{ $pasien->nama }}</p>
        </div>

        <div>
            <p class="text-gray-600 text-sm">NIK</p>
            <p class="text-lg">{{ $pasien->nik }}</p>
        </div>

        <div>
            <p class="text-gray-600 text-sm">Tanggal Lahir</p>
            <p class="text-lg">{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</p>
        </div>

        <div>
            <p class="text-gray-600 text-sm">Alamat</p>
            <p class="text-lg">{{ $pasien->alamat }}</p>
        </div>

        <div>
            <p class="text-gray-600 text-sm">Telepon</p>
            <p class="text-lg">{{ $pasien->telepon ?? '-' }}</p>
        </div>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('pasien.index') }}" class="text-gray-700 hover:text-blue-600">&larr; Kembali ke daftar</a>

        <div class="space-x-2">
            <a href="{{ route('pasien.edit', $pasien) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
            <form action="{{ route('pasien.destroy', $pasien) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection