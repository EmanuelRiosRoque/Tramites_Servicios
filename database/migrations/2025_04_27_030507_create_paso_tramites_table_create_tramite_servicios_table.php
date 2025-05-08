<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tramite_servicios', function (Blueprint $table) {
            $table->id();

            $table->string('origen')->nullable();
            $table->string('formato_requerido')->nullable();


            $table->string('modalidad')->nullable();
            $table->string('fundamento_tramite')->nullable();
            $table->string('fundamento_existencia')->nullable();
            $table->unsignedBigInteger('fk_areasObligada')->nullable();
            $table->string('nombre_tramite')->nullable();
            $table->text('descripcion')->nullable();
            $table->json('tipo')->nullable();

            // Formato
            $table->integer('tipo_formato')->nullable();
            $table->string('otro_formato')->nullable();
            $table->text('fundamento_formato')->nullable();
            $table->date('ultima_fecha_publicacion')->nullable();
            // Inspeccion
            $table->integer('requiere_inspeccion')->nullable();
            $table->string('objetivo_inspeccion')->nullable();
            $table->text('fundamento_inspeccion')->nullable();

            //Plazo
            $table->string('plazo')->nullable();
            $table->string('plazo_sujeto')->nullable();
            $table->string('plazo_solicitante')->nullable();
            
            //Monto
            $table->text('fundamento_monto')->nullable();


            //Vigencia
            $table->string('vigencia')->nullable();
            $table->string('fundamento_vigencia')->nullable();

            //Criterio
            $table->string('criterio')->nullable();
            $table->string('fundamento_criterio')->nullable();

            //Demas datos
            $table->string('demas_datos_relativos')->nullable();

            //Informacion
            $table->string('informacion')->nullable();
            $table->string('fundamento_informacion')->nullable();

            //Estrategia
            $table->string('tramite_en_linea')->nullable();
            $table->string('cargar_documentos')->nullable();
            $table->string('seguimiento')->nullable();
            $table->string('informacion_medios')->nullable();
            $table->string('respuesta_resolucion')->nullable();
            $table->string('utiliza_firma')->nullable();
            $table->string('realizar_notificaciones')->nullable();
            $table->string('demas_informacion')->nullable();

            $table->text('motivo_rechazo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tramite_servicios');
    }
};
