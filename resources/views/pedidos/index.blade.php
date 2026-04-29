
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio Fotográfico</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #121212; color: #ffffff; padding: 15px; max-width: 400px; margin: auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .header h1 { font-size: 20px; margin: 0; color: #ffffff; }
        
        .btn-nuevo { background-color: #ffffff; color: #000000; padding: 15px; text-align: center; font-weight: bold; text-decoration: none; border-radius: 8px; display: block; margin-bottom: 20px; }
        
        .tarjeta { background-color: #2a2a2a; padding: 15px; margin-bottom: 12px; border-radius: 8px; position: relative; }
        .tarjeta.entregada { opacity: 0.5; background-color: #1a1a1a; } /* Opaca y al fondo */
        
        .info-superior { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px; }
        .info h2 { margin: 0 0 5px 0; font-size: 18px; text-transform: capitalize; }
        .texto-gris { color: #aaaaaa; font-size: 14px; }
        
        .acciones-inferiores { display: flex; gap: 10px; align-items: center; }
        
        /* Estilos de botones de los formularios */
        .btn-estado { flex: 1; padding: 12px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; color: white; transition: 0.2s; font-size: 14px; }
        .btn-rojo { background-color: #ff4d4d; }
        .btn-verde { background-color: #88ffb0; color: black; }
        .btn-entregar { flex: 1; padding: 12px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; background-color: #4a4a4a; color: white; }
        .btn-entregar:disabled { opacity: 0.3; cursor: not-allowed; }
        
        .btn-icono { background: none; border: none; cursor: pointer; display: flex; justify-content: center; align-items: center; padding: 10px; border-radius: 6px; }
        .btn-icono.basura { background-color: rgba(255, 77, 77, 0.1); color: #ff4d4d; }
        .btn-icono.regreso { background-color: rgba(255, 255, 255, 0.1); color: white; }
        
        form { margin: 0; display: inline-flex; flex: 1; }
    </style>
</head>
<body>

    <div class="header">
        <h1> Panel de Pedidos</h1>
    </div>

    <a href="{{ route('pedidos.create') }}" class="btn-nuevo">
        + NUEVO CLIENTE
    </a>

    @foreach ($pedidos as $pedido)
        <div class="tarjeta {{ $pedido->estado_pedido == 'Entregada' ? 'entregada' : '' }}">
            
            <div class="info-superior">
                <div class="info">
                    <h2>{{ $pedido->nombre_cliente }}</h2>
                    <span class="texto-gris">{{ $pedido->tipo_foto }} • {{ $pedido->estado_pago }}</span>
                </div>

                <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar este pedido definitivamente?');" style="flex: none;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-icono basura" title="Borrar">🗑️</button>
                </form>
            </div>

            <div class="acciones-inferiores">
                @if ($pedido->estado_pedido != 'Entregada')
                    
                    <form action="{{ route('pedidos.alternar', $pedido) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @if ($pedido->estado_pedido == 'Por Hacer')
                            <button type="submit" class="btn-estado btn-rojo">Pendiente</button>
                        @else
                            <button type="submit" class="btn-estado btn-verde">✓ Foto Lista</button>
                        @endif
                    </form>

                    <form action="{{ route('pedidos.entregar', $pedido) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-entregar" {{ $pedido->estado_pedido == 'Por Hacer' ? 'disabled' : '' }}>
                            Entregar
                        </button>
                    </form>

                @else
                    <span style="flex: 1; text-align: center; font-weight: bold; color: #888;">Trabajo Entregado</span>
                    
                    <form action="{{ route('pedidos.revertir', $pedido) }}" method="POST" style="flex: none;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-icono regreso" title="Deshacer entrega">↩️ Regresar</button>
                    </form>
                @endif
            </div>

        </div>
    @endforeach

</body>
</html>