@extends('layouts.app')

@section('title', 'Edit Nilai')

@section('content')
<div class="container mt-4">
    <h3>Edit Nilai - {{ $operator->nama }}</h3>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf

        <input type="hidden" name="operator_id" value="{{ $operator->id }}">

        @foreach ($kriteria as $krit)
            <div class="mb-3">
                <label class="form-label">{{ $krit->nama }}</label>

                @php
                    $list = $options[$krit->nama] ?? null;
                    $selected = $existingNilai[$krit->id] ?? null;
                @endphp

                @if ($list)
                    <select name="nilai[{{ $krit->id }}]" class="form-select" required>
                        <option value="">-- Pilih Nilai --</option>
                        @foreach ($list as $label => $val)
                            <option value="{{ $val }}" {{ $selected == $val ? 'selected' : '' }}>
                                {{ $label }} ({{ $val }})
                            </option>
                        @endforeach
                    </select>
                @else
                    <input type="number" name="nilai[{{ $krit->id }}]" class="form-control"
                           min="1" max="5" value="{{ $selected }}" required>
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-2">Simpan Perubahan</button>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection
