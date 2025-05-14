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
        Schema::table('tramite_servicios', function (Blueprint $table) {
            // Agregar fk_area
            $table->unsignedBigInteger('fk_area')->nullable()->after('fk_estatus');
            $table->foreign('fk_area')
                  ->references('id')
                  ->on('areas')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tramite_servicios', function (Blueprint $table) {
            // Eliminar fk_area
            $table->dropForeign(['fk_area']);
            $table->dropColumn('fk_area');
        });
    }
};
