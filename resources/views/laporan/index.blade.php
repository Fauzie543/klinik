@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Laporan</h1>

    <!-- Tab Navigation -->
    <div class="flex mb-4">
        <button id="tab-pendapatan"
            class="tab-button py-2 px-4 bg-blue-500 text-white rounded-l-lg hover:bg-blue-600 focus:outline-none">Pendapatan</button>
        <button id="tab-tagihan"
            class="tab-button py-2 px-4 bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">Tagihan</button>
        <button id="tab-pasien"
            class="tab-button py-2 px-4 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600 focus:outline-none">Pasien</button>
    </div>

    <!-- Tab Content -->
    <div id="content-pendapatan" class="tab-content">
        <h2 class="text-xl font-semibold mb-4">Laporan Pendapatan</h2>
        <p>Total Pendapatan: Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
    </div>

    <div id="content-tagihan" class="tab-content hidden">
        <h2 class="text-xl font-semibold mb-4">Laporan Tagihan</h2>
        @if($tagihans->count())
        <table class="min-w-full bg-white border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Nama Pasien</th>
                    <th class="py-2 px-4 border-b">Total</th>
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

    <div id="content-pasien" class="tab-content hidden">
        <h2 class="text-xl font-semibold mb-4">Laporan Pasien</h2>
        @if($pasien->count())
        <table class="min-w-full bg-white border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Nama Pasien</th>
                    <th class="py-2 px-4 border-b">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasien as $index => $p)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border-b">{{ $p->nama }}</td>
                    <td class="py-2 px-4 border-b">{{ $p->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-gray-600">Belum ada data pasien.</p>
        @endif
    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tab-button");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach((tab) => {
        tab.addEventListener("click", function() {
            // Hide all tab contents
            contents.forEach((content) => {
                content.classList.add("hidden");
            });

            // Show the selected tab content
            const target = tab.id.replace("tab-", "content-");
            document.getElementById(target).classList.remove("hidden");

            // Highlight the active tab
            tabs.forEach((btn) => {
                btn.classList.remove("bg-blue-600");
                btn.classList.add("bg-blue-500");
            });
            tab.classList.remove("bg-blue-500");
            tab.classList.add("bg-blue-600");
        });
    });
});
</script>
@endpush