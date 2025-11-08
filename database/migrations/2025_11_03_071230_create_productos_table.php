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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('producto_id');
            $table->string('nombre', 100);
            $table->string('descripcion_corta', 255);
            $table->text('descripcion');
            $table->unsignedInteger('precio'); // (en centavos para evitar decimales)
            $table->unsignedInteger('stock')->default(0);
            
            // Relación con Categoría (Clave Foránea)
            $table->foreignId('categoria_id')->constrained('categorias', 'categoria_id');

            $table->string('imagen', 255)->nullable();
            $table->string('etiqueta', 50)->nullable();

            $table->timestamps(); // Fecha de alta
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
