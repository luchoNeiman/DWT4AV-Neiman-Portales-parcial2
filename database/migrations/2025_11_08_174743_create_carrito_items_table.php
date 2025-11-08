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
        Schema::create('carrito_items', function (Blueprint $table) {
            $table->id('carrito_item_id');
            
            // Relación con Usuario
            $table->foreignId('usuario_id')->constrained('usuarios', 'id')->onDelete('cascade');
            
            // Relación con Producto
            $table->foreignId('producto_id')->constrained('productos', 'producto_id')->onDelete('cascade');
            
            // Cantidad de productos
            $table->unsignedInteger('cantidad')->default(1);
            
            // Precio al momento de agregar (para mantener historial en caso de cambios)
            $table->unsignedInteger('precio_unitario');
            
            $table->timestamps();
            
            // Un usuario no puede tener el mismo producto duplicado, debe actualizar cantidad
            $table->unique(['usuario_id', 'producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_items');
    }
};
