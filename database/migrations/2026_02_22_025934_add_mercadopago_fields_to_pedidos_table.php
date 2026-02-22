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
        Schema::table('pedidos', function (Blueprint $table) {
            // Guardo el ID de la preferencia para generar el botón de pago
            $table->string('preference_id')->nullable()->after('total');

            // Guardo el ID de pago que devuelve Mercado Pago al finalizar
            $table->string('payment_id')->nullable()->after('preference_id');

            // Guardo el estado (approved, pending, rejected)
            $table->string('status')->nullable()->after('payment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn(['preference_id', 'payment_id', 'status']);
        });
    }
};
