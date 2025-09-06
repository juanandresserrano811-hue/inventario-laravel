<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cantidad', 'precio'];

    // Un producto puede tener muchas ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
