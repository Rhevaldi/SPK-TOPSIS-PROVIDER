<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'bobot' => 'required|numeric|min:1|max:5',
            'tipe' => 'required|in:benefit,cost',
        ]);

        Kriteria::create([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan!');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'bobot' => 'required|numeric|min:1|max:5',
            'tipe' => 'required|in:benefit,cost',
        ]);

        $kriteria->update($data);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }


    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus!');
    }
}
