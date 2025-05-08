<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tramite_servicios', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_estatus')->nullable()->after('tipo');

            $table->foreign('fk_estatus')
                  ->references('id')
                  ->on('catalogo_estatus')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('tramite_servicios', function (Blueprint $table) {
            $table->dropForeign(['fk_estatus']);
            $table->dropColumn('fk_estatus');
        });
    }
};
