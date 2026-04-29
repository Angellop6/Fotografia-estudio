<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id(); 
        $table->string('nombre_cliente'); 
        $table->string('tipo_foto'); // Se controlará con botones en la vista
        $table->string('estado_pago'); // Se controlará con botones en la vista
        $table->string('estado_pedido')->default('Por Hacer'); // Estado inicial automático
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
