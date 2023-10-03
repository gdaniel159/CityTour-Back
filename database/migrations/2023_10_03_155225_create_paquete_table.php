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
        Schema::create('paquete', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->decimal('precio',10,2)->nullable();
            $table->string('duracion')->nullable();
            $table->integer('estado')->nullable();

            $table->foreignId('destino_i')->nullable()->references('id')->on('destino');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquete');
    }
};
