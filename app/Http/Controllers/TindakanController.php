<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function index() {
        $tindakan = Tindakan::all();
        return view('tindakan.index', compact('tindakan'));
    }

    public function create() {
        return view('tindakan.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tarif' => 'required|numeric|min:0'
        ]);

        Tindakan::create($request->all());
        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tindakan = Tindakan::findOrFail($id);
        return view('tindakan.edit', compact('tindakan'));
    }

    public function update(Request $request, $id)
    {
        $tindakan = Tindakan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tarif' => 'required|numeric|min:0'
        ]);

        $tindakan->update($request->all());
        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Tindakan::destroy($id);
        return redirect()->route('tindakan.index')->with('success', 'Tindakan berhasil dihapus.');
    }
}