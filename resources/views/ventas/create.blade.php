@extends('layouts.app')

@section('title', 'Nueva venta')

@section('content')
    <h1>Registrar nueva venta</h1>

    <form action="{{ route('ventas.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Producto:</label>
            <select name="producto_id" class="form-select" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">
                        {{ $producto->nombre }} (Stock: {{ $producto->cantidad }}, Precio: ${{ number_format($producto->precio, 2) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cantidad:</label>
            <input type="number" name="cantidad" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Registrar</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
