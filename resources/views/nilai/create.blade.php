@extends('layouts.app')

@section('title', 'Input Nilai Operator')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Input Nilai Operator</h3>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="operator" class="form-label">Pilih Operator</label>
            <select name="operator_id" id="operator" class="form-select" required>
                <option value="">-- Pilih Operator --</option>
                @foreach ($operators as $op)
                    <option value="{{ $op->id }}">{{ $op->nama }}</option>
                @endforeach
            </select>
        </div>

        <hr>

        <h5>Nilai Berdasarkan Kriteria</h5>

        @foreach ($kriteria as $krit)
            <div class="mb-3">
                <label class="form-label">{{ $krit->nama }}</label>

                @php
                    $list = $options[$krit->nama] ?? null;
                @endphp

                @if ($list)
                    <select name="nilai[{{ $krit->id }}]" class="form-select" required>
                        <option value="">-- Pilih Nilai --</option>
                        @foreach ($list as $label => $val)
                            <option value="{{ $val }}">{{ $label }} ({{ $val }})</option>
                        @endforeach
                    </select>
                @else
                    <input type="number" name="nilai[{{ $krit->id }}]" class="form-control" min="1" max="5" placeholder="Masukkan nilai (1–5)" required>
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Simpan Nilai</button>
    </form>
</div>
@endsection
