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
            class="tab-button py-2 px-4 bg-blue-500 text-white hover:bg-blue-600 focus:outline-none">Pasien</button>
        <button id="tab-grafik"
            class="tab-button py-2 px-4 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600 focus:outline-none">Grafik</button>
    </div>


    <!-- Tab Content -->
    <div id="content-pendapatan" class="tab-content">
        <h2 class="text-xl font-semibold mb-4">Laporan Pendapatan</h2>
        <p>Total Pendapatan: Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
        <a href="{{ route('laporan.pendapatan.pdf') }}" target="_blank"
            class="inline-block mb-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            Export PDF
        </a>
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

    <div id="content-grafik" class="tab-content hidden">
        <h2 class="text-xl font-semibold mb-4">Laporan Grafik Klinik</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="font-semibold mb-2">Kunjungan Pasien per Bulan</h3>
                <canvas id="kunjunganChart"></canvas>
            </div>

            <div>
                <h3 class="font-semibold mb-2">Obat Paling Sering Diresepkan</h3>
                <canvas id="obatChart"></canvas>
            </div>
        </div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tab-button");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach((tab) => {
        tab.addEventListener("click", function() {
            contents.forEach((content) => content.classList.add("hidden"));
            const target = tab.id.replace("tab-", "content-");
            document.getElementById(target).classList.remove("hidden");

            tabs.forEach((btn) => {
                btn.classList.remove("bg-blue-600");
                btn.classList.add("bg-blue-500");
            });
            tab.classList.remove("bg-blue-500");
            tab.classList.add("bg-blue-600");
        });
    });

    // Chart Data from Controller
    const kunjunganData = @json($kunjunganData);
    const obatData = @json($obatData);




    new Chart(document.getElementById("kunjunganChart"), {
        type: "bar",
        data: {
            labels: kunjunganData.labels,
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: kunjunganData.data,
                backgroundColor: 'rgba(59, 130, 246, 0.5)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        }
    });


    new Chart(document.getElementById("obatChart"), {
        type: "pie",
        data: {
            labels: obatData.labels,
            datasets: [{
                label: 'Jumlah',
                data: obatData.data,
                backgroundColor: ['#4ADE80', '#FCD34D', '#818CF8', '#FB7185'],
            }]
        }
    });
});
</script>


@endpush