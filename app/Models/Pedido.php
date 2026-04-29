<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Aquí le decimos a Laravel qué columnas pueden recibir datos
    protected $fillable = [
        'nombre_cliente',
        'tipo_foto',
        'estado_pago',
        'estado_pedido'
    ];
}
