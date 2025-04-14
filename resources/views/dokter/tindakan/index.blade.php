@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Data Tindakan</h1>

    @if($tindakans->count())
    <table class="min-w-full bg-white border border-gray-200 rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Nama Tindakan</th>
                <th class="py-2 px-4 border-b">Deskripsi</th>
                <th class="py-2 px-4 border-b">Biaya</th>
                <th class="py-2 px-4 border-b">Resep Obat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tindakans as $index => $tindakan)
            <tr>
                <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                <td class="py-2 px-4 border-b">{{ $tindakan->nama }}</td>
                <td class="py-2 px-4 border-b">{{ $tindakan->deskripsi }}</td>
                <td class="py-2 px-4 border-b">Rp {{ number_format($tindakan->biaya, 0, ',', '.') }}</td>
                <td class="py-2 px-4 border-b">
                    @include('dokter.tindakan._form_resep', ['tindakan' => $tindakan, 'obats' => $obats])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-gray-600">Belum ada data tindakan.</p>
    @endif
</div>
@endsection