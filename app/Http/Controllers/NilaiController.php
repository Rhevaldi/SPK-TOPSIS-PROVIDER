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
        $kriteria = Kriteria::all();

        // dropdown berdasarkan nama kriteria
        $options = [
            'Harga' => [
                '5.000 – 20.000' => 5,
                '21.000 – 40.000' => 4,
                '41.000 – 60.000' => 3,
                '61.000 – 80.000' => 2,
                '> 100.000' => 1,
            ],
            'Jumlah Kuota' => [
                '> 100 GB' => 5,
                '99 – 60 GB' => 4,
                '59 – 30 GB' => 3,
                '39 – 10 GB' => 2,
                '< 10 GB' => 1,
            ],
            'Kecepatan Internet' => [
                '> 20 Mbps' => 5,
                '20 – 18 Mbps' => 4,
                '17 – 15 Mbps' => 3,
                '< 15 Mbps' => 2,
            ],
            'Bonus' => [
                'Akses aplikasi TikTok' => 5,
                'Masa aktif panjang' => 4,
                'Gaming sepuasnya' => 3,
                'Telepon Gratis' => 2,
                'Akses Google Maps' => 1,
            ],
        ];

        return view('nilai.create', compact('operators', 'kriteria', 'options'));
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
    $kriteria = Kriteria::all();
    $existingNilai = Nilai::where('operator_id', $operator_id)->pluck('nilai', 'kriteria_id');

    // dropdown sama kayak di create
    $options = [
        'Harga' => [
            '5.000 – 20.000' => 5,
            '21.000 – 40.000' => 4,
            '41.000 – 60.000' => 3,
            '61.000 – 80.000' => 2,
            '> 100.000' => 1,
        ],
        'Jumlah Kuota' => [
            '> 100 GB' => 5,
            '99 – 60 GB' => 4,
            '59 – 30 GB' => 3,
            '39 – 10 GB' => 2,
            '< 10 GB' => 1,
        ],
        'Kecepatan Internet' => [
            '> 20 Mbps' => 5,
            '20 – 18 Mbps' => 4,
            '17 – 15 Mbps' => 3,
            '< 15 Mbps' => 2,
        ],
        'Bonus' => [
            'Akses aplikasi TikTok' => 5,
            'Masa aktif panjang' => 4,
            'Gaming sepuasnya' => 3,
            'Telepon Gratis' => 2,
            'Akses Google Maps' => 1,
        ],
    ];

    return view('nilai.edit', compact('operator', 'kriteria', 'existingNilai', 'options'));
}

public function destroy($operator_id)
{
    Nilai::where('operator_id', $operator_id)->delete();
    return redirect()->route('nilai.index')->with('success', 'Semua nilai operator berhasil dihapus!');
}



}
