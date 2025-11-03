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
            $table->text('descripcion')->nullable(); // nullable() si puede ser opcional
            $table->unsignedInteger('precio'); // O decimal('precio', 8, 2) si prefieres decimales
            $table->integer('stock')->default(0); // Valor por defecto
            // Para claves foráneas (ej: categoría)
            // $table->foreignId('categoria_id')->constrained('categorias', 'categoria_id');
            $table->string('imagen')->nullable();
            $table->timestamps(); // Crea created_at y updated_at automáticamente
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
