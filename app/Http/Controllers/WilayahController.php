<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index() {
        $wilayah = Wilayah::all();
        return view('wilayah.index', compact('wilayah'));
    }

    public function create() {
        return view('wilayah.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'nullable|string|max:10|unique:wilayah',
            'keterangan' => 'nullable|string'
        ]);

        Wilayah::create($request->all());
        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        return view('wilayah.edit', compact('wilayah'));
    }

    public function update(Request $request, $id)
    {
        $wilayah = Wilayah::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'nullable|string|max:10|unique:wilayah,kode,' . $wilayah->id,
            'keterangan' => 'nullable|string'
        ]);

        $wilayah->update($request->all());
        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Wilayah::destroy($id);
        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil dihapus.');
    }
}