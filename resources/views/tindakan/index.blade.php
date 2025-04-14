@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Manajemen Tindakan</h1>
        <a href="{{ route('tindakan.create') }}" class="btn btn-primary">Tambah Tindakan</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tarif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tindakan as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp {{ number_format($item->tarif, 2, ',', '.') }}</td>
                <td class="flex gap-2">
                    <a href="{{ route('tindakan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tindakan.destroy', $item->id) }}" method="POST"
                        onsubmit="return confirm('Hapus tindakan ini?')">
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