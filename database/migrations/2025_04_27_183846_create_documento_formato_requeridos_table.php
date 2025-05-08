<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documentos_formatos_requeridos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramite_servicio_id')->nullable(); 
            $table->string('nombre_archivo')->nullable(); 
            $table->string('tipo_archivo')->nullable(); 
            $table->bigInteger('tamano_archivo')->nullable();
            $table->enum('tipo', ['documento', 'formato'])->nullable(); 
            $table->string('ruta_archivo')->nullable(); 
            $table->timestamps();

            // Clave foránea
            $table->foreign('tramite_servicio_id')
                  ->references('id')
                  ->on('tramite_servicios')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos_formatos_requeridos');
    }
};
