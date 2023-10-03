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
        Schema::create('registro_paquete', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->references('id')->on('cliente');
            $table->foreignId('detalle_pack_id')->nullable()->references('id')->on('detalle_paquete');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_paquete');
    }
};
