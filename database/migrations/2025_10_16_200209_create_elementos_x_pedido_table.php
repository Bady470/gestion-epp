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
    Schema::create('elementos_x_pedido', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pedidos_id')->constrained('pedidos')->cascadeOnUpdate();
        $table->foreignId('elementos_pp_id')->constrained('elementos_pp')->cascadeOnUpdate();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_x_pedido');
    }
};