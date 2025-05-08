<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pasos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramite_servicio_id'); // FK al tramite_servicio
            $table->text('paso');
            $table->timestamps();
        
            $table->foreign('tramite_servicio_id')->references('id')->on('tramite_servicios')->onDelete('cascade');
            
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('pasos');
    }
};
