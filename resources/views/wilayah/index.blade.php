@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Manajemen Wilayah</h1>
        <a href="{{ route('wilayah.create') }}" class="btn btn-primary">Tambah Wilayah</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wilayah as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->keterangan }}</td>
                <td class="flex gap-2">
                    <a href="{{ route('wilayah.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('wilayah.destroy', $item->id) }}" method="POST"
                        onsubmit="return confirm('Hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection