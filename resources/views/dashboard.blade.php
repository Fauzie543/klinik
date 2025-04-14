@extends('layouts.app')

@section('content')
<div class="p-4 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ auth()->user()->roles->first()?->name ?? 'Tanpa Role' }}
    </h1>

    <p>Anda login sebagai: <span
            class="font-semibold capitalize">{{ auth()->user()->roles->first()?->name ?? 'Tanpa Role' }}
        </span></p>

    {{-- Dashboard bisa ditambahkan statistik sesuai role jika perlu --}}
</div>
@endsection