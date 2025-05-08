<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoInmueblesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('catalogo_inmuebles')->insert([
            ['nombre_inmueble' => 'Inmueble Niños Héroes No. 119'],
            ['nombre_inmueble' => 'Inmueble Niños Héroes No. 132'],
            ['nombre_inmueble' => 'Inmueble Niños Héroes No. 150'],
            ['nombre_inmueble' => 'Inmueble Torre Norte'],
            ['nombre_inmueble' => 'Inmueble Torre Sur'],
            ['nombre_inmueble' => 'Inmueble Claudio Bernard'],
            ['nombre_inmueble' => 'Inmueble Instituto de Ciencias Forenses'],
            ['nombre_inmueble' => 'Inmueble Centro de Justicia alternativa'],
            ['nombre_inmueble' => 'Inmueble Patriotismo'],
            ['nombre_inmueble' => 'Inmueble Dr. Liceaga'],
            ['nombre_inmueble' => 'Inmueble Dr. Lavista'],
            ['nombre_inmueble' => 'Inmueble Clementina Gil de Léster'],
            ['nombre_inmueble' => 'Inmueble Centro de Desarrollo Infantil Gloria Ledúc de Agüero'],
            ['nombre_inmueble' => 'Inmueble Centro de Desarrollo Infantil José María Pino Suarez'],
            ['nombre_inmueble' => 'Inmueble Centro de Desarrollo Infantil Niños Héroes'],
            ['nombre_inmueble' => 'Inmueble Archivo Delicias'],
            ['nombre_inmueble' => 'Inmueble Archivo – Fernando de Alva Ixtlilxóchitl'],
            ['nombre_inmueble' => 'Inmueble Archivo Dr. Navarro'],
            ['nombre_inmueble' => 'Inmueble Reclusorio Preventivo Norte'],
            ['nombre_inmueble' => 'Inmueble Reclusorio Preventivo Sur'],
            ['nombre_inmueble' => 'Inmueble Reclusorio Preventivo Oriente'],
            ['nombre_inmueble' => 'Inmueble Reclusorio Preventivo Santa Martha Acatitla'],
            ['nombre_inmueble' => 'Inmueble Plaza Juarez'],
            ['nombre_inmueble' => 'Inmueble Lerma'],
        ]);
    }
}
