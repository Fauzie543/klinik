@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Data Tagihan</h1>

    @if($tagihans->count())
    <table class="min-w-full bg-white border border-gray-200 rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Nama Pasien</th>
                <th class="py-2 px-4 border-b">Total</th>
                <th class="py-2 px-4 border-b">Tindakan</th> <!-- Kolom Tindakan -->
                <th class="py-2 px-4 border-b">Obat</th> <!-- Kolom Obat -->
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $index => $tagihan)
            <tr>
                <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                <td class="py-2 px-4 border-b">{{ $tagihan->pasien->nama ?? '-' }}</td>
                <td class="py-2 px-4 border-b">Rp {{ number_format($tagihan->total, 0, ',', '.') }}</td>
                <td class="py-2 px-4 border-b">Rp {{ number_format($tagihan->tindakan->biaya ?? 0, 0, ',', '.') }}</td>
                <!-- Tindakan -->
                <td class="py-2 px-4 border-b">
                    @foreach ($tagihan->tindakan->resepObats as $resep)
                    <div>{{ $resep->obat->nama_obat }} ({{ $resep->jumlah }} x
                        Rp{{ number_format($resep->obat->harga, 0, ',', '.') }})</div>
                    @endforeach
                </td> <!-- Obat -->
                <td class="py-2 px-4 border-b">{{ ucfirst($tagihan->status) }}</td>
                <td class="py-2 px-4 border-b">{{ $tagihan->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-gray-600">Belum ada data tagihan.</p>
    @endif
</div>
@endsection