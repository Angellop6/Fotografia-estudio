<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido; // Importamos tu modelo

class PedidoSeeder extends Seeder
{
    public function run(): void
    {
        // Cliente 1: Apenas entró (Por Hacer)
        Pedido::create([
            'nombre_cliente' => 'Cliente 1',
            'tipo_foto' => 'Infantil',
            'estado_pago' => 'Anticipo',
            'estado_pedido' => 'Por Hacer'
        ]);

        // Cliente 2: Ya se editaron sus fotos (Lista)
        Pedido::create([
            'nombre_cliente' => 'Cliente 2',
            'tipo_foto' => 'Boda',
            'estado_pago' => 'Pagado',
            'estado_pedido' => 'Lista'
        ]);
    }
}
