@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Ventas</h1>
        <a href="{{ route('ventas.create') }}" class="btn btn-primary">➕ Registrar venta</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->producto->nombre }}</td>
                <td>{{ $venta->cantidad }}</td>
                <td>${{ number_format($venta->total, 2) }}</td>
                <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
