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
    Schema::create('pedidos_has_solicitudes', function (Blueprint $table) {
        $table->foreignId('pedidos_id')->constrained('pedidos')->cascadeOnUpdate();
        $table->foreignId('solicitudes_id')->constrained('solicitudes')->cascadeOnUpdate();
        $table->primary(['pedidos_id', 'solicitudes_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_has_solicitudes');
    }
};