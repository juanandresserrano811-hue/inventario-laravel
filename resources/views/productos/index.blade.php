@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">➕ Nuevo producto</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
