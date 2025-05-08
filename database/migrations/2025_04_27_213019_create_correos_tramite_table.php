<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('correos_tramite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramite_servicio_id'); //   FK al trámite
            $table->string('correo')->nullable(); //   Correo electrónico
            $table->string('area')->nullable(); //   Área responsable
            $table->timestamps();

            $table->foreign('tramite_servicio_id')
                  ->references('id')
                  ->on('tramite_servicios')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('correos_tramite');
    }
};
