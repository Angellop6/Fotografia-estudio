<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Pedido - Estudio</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #121212; color: #ffffff; padding: 20px; max-width: 400px; margin: auto; }
        h1 { font-size: 24px; text-align: center; color: #e0e0e0; margin-bottom: 30px; }
        .form-group { margin-bottom: 25px; }
        label.titulo { display: block; font-size: 14px; color: #aaaaaa; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px; }
        input[type="text"] { width: 100%; box-sizing: border-box; padding: 15px; background-color: #2a2a2a; border: 1px solid #444; color: white; font-size: 18px; border-radius: 8px; outline: none; }
        input[type="text"]:focus { border-color: #ffffff; }
        
        /* Truco para los botones grandes */
        .botones-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .botones-grid input[type="radio"] { display: none; }
        .botones-grid label { background-color: #2a2a2a; border: 2px solid transparent; padding: 15px; text-align: center; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.2s; }
        
        /* Colores al seleccionar */
        .botones-grid input[type="radio"]:checked + label { background-color: #4a4a4a; border-color: #ffffff; color: #ffffff; }
        
        .btn-guardar { width: 100%; background-color: #ffffff; color: #000000; padding: 18px; font-size: 18px; font-weight: bold; border: none; border-radius: 8px; cursor: pointer; margin-top: 20px; }
        .btn-cancelar { display: block; text-align: center; color: #aaaaaa; text-decoration: none; margin-top: 15px; font-size: 14px; }
    </style>
</head>
<body>

    <h1>📸 Nuevo Pedido</h1>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf <div class="form-group">
            <label class="titulo">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" required autocomplete="off" autofocus>
        </div>

        <div class="form-group">
            <label class="titulo">Tipo de Trabajo</label>
            <div class="botones-grid" style="grid-template-columns: 1fr 1fr 1fr;">
                <input type="radio" id="infantil" name="tipo_foto" value="Infantil" required>
                <label for="infantil">Infantil</label>

                <input type="radio" id="diploma" name="tipo_foto" value="Diploma">
                <label for="diploma">Diploma</label>

                <input type="radio" id="boda" name="tipo_foto" value="Boda">
                <label for="boda">Boda</label>
            </div>
        </div>

        <div class="form-group">
            <label class="titulo">Estado del Pago</label>
            <div class="botones-grid">
                <input type="radio" id="anticipo" name="estado_pago" value="Anticipo" required>
                <label for="anticipo" style="color: #ffcc00;">Anticipo</label>

                <input type="radio" id="pagado" name="estado_pago" value="Pagado">
                <label for="pagado" style="color: #00e676;">Pagado</label>
            </div>
        </div>

        <button type="submit" class="btn-guardar">Registrar Pedido</button>
        <a href="{{ route('pedidos.index') }}" class="btn-cancelar">Cancelar</a>
    </form>

</body>
</html>