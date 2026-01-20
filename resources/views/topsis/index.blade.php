@extends('layouts.app')

@section('title', 'Hasil Perhitungan TOPSIS')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-line"></i> Hasil Perhitungan TOPSIS
            </h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-light">
                        <tr>
                            <th width="10%">Peringkat</th>
                            <th>Operator</th>
                            <th width="20%">Nilai Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hasil as $i => $row)
                            <tr class="{{ $i === 0 ? 'bg-warning text-dark font-weight-bold' : '' }}">
                                <td>
                                    @if ($i === 0)
                                        🥇
                                    @else
                                        {{ $i + 1 }}
                                    @endif
                                </td>
                                <td>{{ $row['operator'] }}</td>
                                <td>{{ number_format($row['nilai'], 1) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted">
                                    Belum ada hasil perhitungan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
