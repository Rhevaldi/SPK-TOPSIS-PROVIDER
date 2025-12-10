@extends('layouts.app')


@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3"> 
        <h3>Hasil Perhitungan TOPSIS</h3>
    </div>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Operator</th>
                <th>Nilai Preferensi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasil as $i => $row)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $row['operator'] }}</td>
                    <td>{{ $row['nilai'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
