<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Operator;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['operator', 'kriteria'])->get();
        return view('nilai.index', compact('nilai'));
    }

    public function create()
    {
    $operators = Operator::all();
    $kriteria = Kriteria::with('subKriteria')->get();

    return view('nilai.create', compact('operators', 'kriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'operator_id' => 'required|exists:operators,id',
            'nilai' => 'required|array',
        ]);

        foreach ($request->nilai as $kriteria_id => $nilai) {
            Nilai::updateOrCreate(
                ['operator_id' => $request->operator_id, 'kriteria_id' => $kriteria_id],
                ['nilai' => $nilai]
            );
        }

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil disimpan!');
    }

public function edit($operator_id)
{
    $operator = Operator::findOrFail($operator_id);
    $kriteria = Kriteria::with('subKriteria')->get();
    $existingNilai = Nilai::where('operator_id', $operator_id)
                        ->pluck('nilai', 'kriteria_id');

    return view('nilai.edit', compact('operator', 'kriteria', 'existingNilai'));
}


public function destroy($operator_id)
{
    Nilai::where('operator_id', $operator_id)->delete();
    return redirect()->route('nilai.index')->with('success', 'Semua nilai operator berhasil dihapus!');
}



}
