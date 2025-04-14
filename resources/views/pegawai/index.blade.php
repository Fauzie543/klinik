@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Daftar Pegawai</h1>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Pegawai</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-striped w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai as $pegawaiItem)
            <tr>
                <td>{{ $pegawaiItem->id }}</td>
                <td>{{ $pegawaiItem->nama }}</td>
                <td>{{ $pegawaiItem->jabatan }}</td>
                <td>{{ $pegawaiItem->email }}</td>
                <td>{{ $pegawaiItem->telepon }}</td>
                <td>
                    <a href="{{ route('pegawai.edit', $pegawaiItem->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pegawai.destroy', $pegawaiItem->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection