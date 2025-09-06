<!DOCTYPE html>
<html>
<head>
    <title>Editar producto</title>
</head>
<body>
    <h1>Editar producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required><br><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="{{ $producto->cantidad }}" required><br><br>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required><br><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('productos.index') }}">Atrás</a>
    </form>
</body>
</html>
