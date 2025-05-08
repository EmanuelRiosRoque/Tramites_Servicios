<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('requisitos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramite_servicio_id'); 
            $table->text('requisito')->nullable();
            $table->timestamps();

            // Opcional: Clave foránea
            $table->foreign('tramite_servicio_id')->references('id')->on('tramite_servicios')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requisitos');
    }
};
