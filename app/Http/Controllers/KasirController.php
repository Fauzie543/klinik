<?php

namespace App\Http\Controllers;
use App\Models\Tagihan; 

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::with(['pasien', 'tindakan.resepObats.obat'])->latest()->get();

    // Hitung total biaya dari tindakan + obat
    foreach ($tagihans as $tagihan) {
        $biayaTindakan = $tagihan->tindakan->biaya ?? 0;
        $totalObat = $tagihan->tindakan->resepObats->sum(function ($resep) {
            return $resep->jumlah * ($resep->obat->harga ?? 0);
        });
        $tagihan->total = $biayaTindakan + $totalObat;
    }

    return view('kasir.tagihan.index', compact('tagihans'));
    }
}