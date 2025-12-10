<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $operators = Operator::all();
        return view('operator.index', compact('operators'));
    }

    public function create()
    {
        return view('operator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        Operator::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('operator.index')->with('success', 'Operator berhasil ditambahkan!');
    }

    public function edit(Operator $operator)
    {
        return view('operator.edit', compact('operator'));
    }

    public function update(Request $request, Operator $operator)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        $operator->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('operator.index')->with('success', 'Operator berhasil diperbarui!');
    }

    public function destroy(Operator $operator)
    {
        $operator->delete();
        return redirect()->route('operator.index')->with('success', 'Operator berhasil dihapus!');
    }
}
