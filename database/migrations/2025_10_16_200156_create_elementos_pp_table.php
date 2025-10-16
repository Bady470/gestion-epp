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
    Schema::create('elementos_pp', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100)->nullable();
        $table->text('descripcion')->nullable();
        $table->string('talla')->nullable();
        $table->string('img_url', 100)->nullable();
        $table->integer('cantidad')->default(0);
        $table->foreignId('categorias_id')->constrained('areas')->cascadeOnUpdate();
        $table->foreignId('filtros_id')->constrained('filtros')->cascadeOnUpdate();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_pp');
    }
};