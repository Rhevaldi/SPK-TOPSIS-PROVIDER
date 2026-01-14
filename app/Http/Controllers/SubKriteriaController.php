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
        return view('subkriteria.index', compact('data'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('subkriteria.create', compact('kriteria'));
    }

    public function store(Request $r)
    {
        SubKriteria::create($r->validate([
            'kriteria_id' => 'required',
            'nama'        => 'required',
            'nilai'       => 'required|numeric'
        ]));

        return redirect()->route('subkriteria.index')
            ->with('success','Sub kriteria ditambahkan');
    }

    public function destroy($id)
    {
        SubKriteria::findOrFail($id)->delete();
        return back()->with('success','Sub kriteria dihapus');
    }
}
