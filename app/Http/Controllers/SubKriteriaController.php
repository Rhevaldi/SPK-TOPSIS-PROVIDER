<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $data = SubKriteria::with('kriteria')->get();
        $kriterias = Kriteria::all(); // untuk filter (opsional)
        return view('subkriteria.index', compact('data','kriterias'));
    }

    public function create()
    {
        $kriterias = Kriteria::all();
        return view('subkriteria.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kriteria_id' => 'required|exists:kriteria,id',
            'nama'        => 'required|string|max:100',
            'nilai'       => 'required|numeric|min:1|max:5',
        ]);

        SubKriteria::create($data);

        return redirect()
            ->route('subkriteria.index')
            ->with('success','Sub kriteria berhasil ditambahkan');
    }

    public function edit(SubKriteria $subkriteria)
    {
        $kriterias = Kriteria::all();
        return view('subkriteria.edit', compact('subkriteria','kriterias'));
    }

    public function update(Request $request, SubKriteria $subkriteria)
    {
        $data = $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'nama'        => 'required|string|max:100',
            'nilai'       => 'required|numeric|min:1|max:5',
        ]);

        $subkriteria->update($data);

        return redirect()
            ->route('subkriteria.index')
            ->with('success','Sub kriteria berhasil diperbarui');
    }

    public function destroy(SubKriteria $subkriteria)
    {
        $subkriteria->delete();

        return back()->with('success','Sub kriteria berhasil dihapus');
    }
}
