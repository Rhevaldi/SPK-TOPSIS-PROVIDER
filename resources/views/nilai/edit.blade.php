@extends('layouts.app')

@section('title', 'Edit Nilai')

@section('content')
    <div class="container mt-4">
        <h3>Edit Nilai - {{ $operator->nama }}</h3>

        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf

            <input type="hidden" name="operator_id" value="{{ $operator->id }}">

            <select name="nilai[{{ $krit->id }}]" class="form-select">
                @foreach ($krit->subKriteria as $sub)
                    <option value="{{ $sub->nilai }}"
                        {{ ($existingNilai[$krit->id] ?? null) == $sub->nilai ? 'selected' : '' }}>
                        {{ $sub->nama }} ({{ $sub->nilai }})
                    </option>
                @endforeach
            </select>


            <button type="submit" class="btn btn-primary mt-2">Simpan Perubahan</button>
            <a href="{{ route('nilai.index') }}" class="btn btn-secondary mt-2">Kembali</a>
        </form>
    </div>
@endsection
