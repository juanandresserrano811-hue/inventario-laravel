<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('producto')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $producto = Producto::findOrFail($request->producto_id);

        // Validar stock
        if ($request->cantidad > $producto->cantidad) {
            return redirect()->back()->with('error', 'No hay suficiente stock.');
        }

        // Restar stock
        $producto->cantidad -= $request->cantidad;
        $producto->save();

        // Crear venta
        Venta::create([
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'total' => $request->cantidad * $producto->precio,
        ]);

        return redirect()->route('ventas.index');
    }
}
