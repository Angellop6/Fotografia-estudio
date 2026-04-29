<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::orderByRaw("estado_pedido = 'Entregada' ASC")->latest()->get();
        return view('pedidos.index', compact('pedidos'));
    }

    // Muestra la vista del formulario
    public function create()
    {
        return view('pedidos.create');
    }

    // Recibe los datos, los guarda y regresa a la pantalla principal
    public function store(Request $request)
    {
        // Guardamos todo lo que viene del formulario directamente
        Pedido::create([
            'nombre_cliente' => $request->nombre_cliente,
            'tipo_foto' => $request->tipo_foto,
            'estado_pago' => $request->estado_pago,
            'estado_pedido' => 'Por Hacer' // Siempre inicia así
        ]);

        // Redirigimos a la pantalla principal en menos de un segundo
        return redirect()->route('pedidos.index');
    }

    // Alternar entre Pendiente y Lista
    public function alternarEstado(Pedido $pedido)
    {
        if ($pedido->estado_pedido == 'Por Hacer') {
            $pedido->update(['estado_pedido' => 'Lista']);
        } else {
            $pedido->update(['estado_pedido' => 'Por Hacer']);
        }
        return redirect()->route('pedidos.index');
    }

    // Cambiar a Entregada
    public function entregar(Pedido $pedido)
    {
        $pedido->update(['estado_pedido' => 'Entregada']);
        return redirect()->route('pedidos.index');
    }

    // Deshacer una entrega
    public function revertir(Pedido $pedido)
    {
        // Lo regresamos a Lista para que puedan volver a entregarlo o modificarlo
        $pedido->update(['estado_pedido' => 'Lista']); 
        return redirect()->route('pedidos.index');
    }

    // Eliminar el registro (con confirmación en la vista)
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index');
    }


}
