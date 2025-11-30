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
        Schema::create('pedido_items', function (Blueprint $table) {
            $table->id('pedido_item_id');

            // Aca referencia a 'pedido_id' de la tabla 'pedidos'
            // Es importante que la tabla 'pedidos' ya exista
            $table->foreignId('pedido_id')
                ->constrained('pedidos', 'pedido_id')
                ->onDelete('cascade');

            // Referencia a productos
            $table->foreignId('producto_id')
                ->constrained('productos', 'producto_id');

            $table->string('nombre_producto');
            $table->integer('cantidad');
            $table->unsignedInteger('precio_unitario');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_items');
    }
};
