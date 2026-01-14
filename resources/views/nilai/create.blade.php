@extends('layouts.app')

@section('title', 'Input Nilai Operator')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center mt-3">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-clipboard-check"></i> Input Nilai Operator
                        </h3>
                    </div>

                    <form action="{{ route('nilai.store') }}" method="POST">
                        @csrf

                        <div class="card-body">

                            {{-- Pilih Operator --}}
                            <div class="form-group">
                                <label>Pilih Operator</label>
                                <select name="operator_id" class="form-control" required>
                                    <option value="">-- Pilih Operator --</option>
                                    @foreach ($operators as $op)
                                        <option value="{{ $op->id }}">{{ $op->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr>

                            <h5 class="mb-3 text-muted">
                                Nilai Berdasarkan Kriteria
                            </h5>

                            {{-- Nilai per Kriteria --}}
                            @foreach ($kriteria as $krit)
                                <div class="mb-3">
                                    <label class="form-label">{{ $krit->nama }}</label>

                                    @if ($krit->subKriteria->count())
                                        <select name="nilai[{{ $krit->id }}]" class="form-select" required>
                                            <option value="">-- Pilih Nilai --</option>
                                            @foreach ($krit->subKriteria as $sub)
                                                <option value="{{ $sub->nilai }}">
                                                    {{ $sub->nama }} ({{ $sub->nilai }})
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="number" name="nilai[{{ $krit->id }}]" class="form-control"
                                            min="1" max="5" required>
                                    @endif
                                </div>
                            @endforeach


                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Nilai
                            </button>
                            <a href="{{ route('nilai.index') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
