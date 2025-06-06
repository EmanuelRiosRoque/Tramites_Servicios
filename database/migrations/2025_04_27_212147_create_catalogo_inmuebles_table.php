<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catalogo_inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_inmueble');
            $table->string('direccion')->nullable(); // campo para dirección, puede ser nulo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogo_inmuebles');
    }
};
