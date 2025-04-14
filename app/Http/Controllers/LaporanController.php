<?php

namespace App\Http\Controllers;
use App\Models\Tagihan;
use App\Models\Pasien;
use App\Models\Tindakan;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPendapatan = Tagihan::sum('total');
    $tagihans = Tagihan::with('pasien', 'tindakan.resepObats.obat')->get();
    $pasien = Pasien::all();

    // -----------------------------
    // Kunjungan per bulan (dari created_at di Tagihan)
    $kunjungan = Tagihan::selectRaw("TO_CHAR(created_at, 'Mon') as bulan, DATE_PART('month', created_at) as bulan_angka, COUNT(*) as jumlah")
    ->groupByRaw("bulan, bulan_angka")
    ->orderByRaw("bulan_angka")
    ->get();

    $kunjunganData = [
        'labels' => $kunjungan->pluck('bulan'),
        'data' => $kunjungan->pluck('jumlah'),
    ];

    // -----------------------------
    // Tindakan terbanyak (dari relasi Tagihan -> tindakan)
    $tindakanData = [
        'labels' => [],
        'data' => [],
    ];
    

    // -----------------------------
    // Obat paling sering diresepkan (dari resep_obat)
    $obat = DB::table('resep_obats')
        ->join('obats', 'obats.id', '=', 'resep_obats.obat_id')
        ->select('obats.nama', DB::raw('COUNT(*) as jumlah'))
        ->groupBy('obats.nama')
        ->orderByDesc('jumlah')
        ->limit(5)
        ->get();

    $obatData = [
        'labels' => $obat->pluck('nama'),
        'data' => $obat->pluck('jumlah'),
    ];

    // -----------------------------
    return view('laporan.index', compact(
        'totalPendapatan',
        'tagihans',
        'pasien',
        'kunjunganData',
        'tindakanData',
        'obatData'
    ));
    }

    public function laporanPendapatan()
    {
        $totalPendapatan = Tagihan::sum('total'); // Total pendapatan dari semua tagihan
        return view('admin.laporan.pendapatan', compact('totalPendapatan'));
    }

    public function laporanTagihan()
    {
        $tagihans = Tagihan::with('pasien', 'tindakan.resepObats.obat')->get();
        return view('admin.laporan.tagihan', compact('tagihans'));
    }

    public function laporanPasien()
    {
        $pasien = Pasien::all(); // Ambil semua data pasien
        return view('admin.laporan.pasien', compact('pasien'));
    }

    public function exportPendapatanPdf()
{
    $totalPendapatan = Tagihan::where('status', 'lunas')->sum('total');
    $pdf = Pdf::loadView('laporan.pdf.pendapatan', compact('totalPendapatan'));
    return $pdf->download('laporan_pendapatan.pdf');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}