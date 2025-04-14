<?php

namespace App\Http\Controllers;
use App\Models\Tagihan;
use App\Models\Pasien;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPendapatan = Tagihan::sum('total'); // Total pendapatan dari semua tagihan
    $tagihans = Tagihan::with('pasien', 'tindakan.resepObats.obat')->get();
    $pasien = Pasien::all(); // Ambil semua data pasien
    
    return view('laporan.index', compact('totalPendapatan', 'tagihans', 'pasien'));
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