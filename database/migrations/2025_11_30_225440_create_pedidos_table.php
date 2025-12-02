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
        $table->id('pedido_id');
        
        $table->foreignId('id')->constrained('usuarios')->onDelete('cascade');
        
        $table->dateTime('fecha');
        $table->unsignedInteger('total');
        $table->string('estado', 50)->default('completado');
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
