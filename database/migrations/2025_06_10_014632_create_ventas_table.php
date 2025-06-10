<?php

use App\Models\User;
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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto', 10, 2,true);
            $table->tinyInteger('estado')->default(1); // 1: activo, 0: inactivo
            $table->foreignId('comprobante_id')->nullable()->constrained('comprobantes')->onDelete('set null');
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('personas')->onDelete('set null');
            $table->decimal('total', 10, 2);
            $table->decimal('subtotal', 10, 2);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
