<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    

    public function index()
    {
        $pegawai = Pegawai::all(); // Menampilkan semua pegawai
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pegawai',
            'telepon' => 'required|string|max:15',
        ]);

        Pegawai::create([
            'nama' => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'],
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai created successfully.');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pegawai,email,' . $pegawai->id,
            'telepon' => 'required|string|max:15',
        ]);

        $pegawai->update([
            'nama' => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'],
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai updated successfully.');
    }

    public function destroy($id)
    {
        Pegawai::destroy($id);
        return redirect()->route('pegawai.index')->with('success', 'Pegawai deleted successfully.');
    }
}