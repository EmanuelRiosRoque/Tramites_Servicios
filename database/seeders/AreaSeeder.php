<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            'CENTRO DE JUSTICIA ALTERNATIVA',
            'COMUNICACIÓN SOCIAL',
            'CONSIGNACIONES CIVILES',
            'CONSIGNACIONES PENALES',
            'COORDINACIÓN DE INTERVENCIÓN ESPECIALIZADA PARA EL APOYO JUDICIAL',
            'DIRECCIÓN DE ARCHIVO JUDICIAL',
            'DIRECCIÓN DE ORIENTACIÓN CIUDADANA Y DERECHOS HUMANOS',
            'DIRECCIÓN EJECUTIVA DE GESTIÓN JUDICIAL',
            'DIRECCIÓN EJECUTIVA DE GESTIÓN TECNOLÓGICA',
            'DIRECCIÓN EJECUTIVA DE RECURSOS FINANCIEROS',
            'DIRECCIÓN EJECUTIVA DE RECURSOS MATERIALES',
            'DIRECCIÓN GENERAL DE ANALES DE JURISPRUDENCIA Y BOLETÍN JUDICIAL',
            'INSTITUTO DE ESTUDIOS JUDICIALES',
            'INSTITUTO DE SERVICIOS PERICIALES Y CIENCIAS FORENSES',
            'OFICIALÍA DE PARTES COMÚN',
            'OFICIALÍA DE PARTES DE LA PRESIDENCIA',
            'PRIMERA SECRETARÍA DE ACUERDOS DE PRESIDENCIA Y DEL PLENO',
            'SEGUNDA SECRETARÍA DE ACUERDOS DE PRESIDENCIA Y DEL PLENO',
            'UNIDAD DE TRANSPARENCIA TRIBUNAL',
        ];

        foreach ($areas as $area) {
            DB::table('areas')->insert([
                'nombre' => $area,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
