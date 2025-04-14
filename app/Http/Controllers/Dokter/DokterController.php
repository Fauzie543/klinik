<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Tindakan;
use App\Models\Obat;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function tindakan()
{
    $tindakans = Tindakan::all();
    $obats = Obat::all(); // penting untuk form resep

    return view('dokter.tindakan.index', compact('tindakans', 'obats'));
}
    // public function index()
    // {
    //     //
    // }

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

    public function storeResep(Request $request, Tindakan $tindakan)
{
    $request->validate([
        'obat_id' => 'required|exists:obats,id',
        'jumlah' => 'required|integer|min:1',
        'catatan' => 'nullable|string',
    ]);

    $tindakan->obat()->attach($request->obat_id, [
        'jumlah' => $request->jumlah,
        'catatan' => $request->catatan,
    ]);

    return back()->with('success', 'Obat berhasil diresepkan.');
}
}