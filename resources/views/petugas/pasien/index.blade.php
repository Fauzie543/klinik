@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Pasien</h2>

<a href="{{ route('pendaftaran.pasien.create') }}"
    class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah
    Pasien</a>

@if (session('success'))
<div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="w-full table-auto border">
    <thead>
        <tr class="bg-gray-100">
            <th class="border p-2">#</th>
            <th class="border p-2">Nama</th>
            <th class="border p-2">NIK</th>
            <th class="border p-2">Tanggal Lahir</th>
            <th class="border p-2">Alamat</th>
            <th class="border p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasiens as $pasien)
        <tr>
            <td class="border p-2">{{ $loop->iteration }}</td>
            <td class="border p-2">{{ $pasien->nama }}</td>
            <td class="border p-2">{{ $pasien->nik }}</td>
            <td class="border p-2">{{ $pasien->tanggal_lahir }}</td>
            <td class="border p-2">{{ $pasien->alamat }}</td>
            <td class="border p-2">
                <a href="{{ route('pendaftaran.pasien.edit', $pasien) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('pendaftaran.pasien.destroy', $pasien) }}" method="POST" class="inline"
                    onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf @method('DELETE')
                    <button class="text-red-500 ml-2">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection