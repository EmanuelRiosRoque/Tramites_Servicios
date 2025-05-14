<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoInmueblesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('catalogo_inmuebles')->insert([
            [
                'nombre_inmueble' => 'Inmueble Niños Héroes No. 119',
                'direccion' => 'Calle Niños Héroes No. 119, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Niños Héroes No. 132',
                'direccion' => 'Calle Niños Héroes No. 132, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Niños Héroes No. 150',
                'direccion' => 'Calle Niños Héroes No. 150, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Torre Norte',
                'direccion' => 'Avenida Niños Héroes No. 132, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Torre Sur',
                'direccion' => 'Avenida Niños Héroes No. 150, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Claudio Bernard',
                'direccion' => 'Calle Claudio Bernard No. 60, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Instituto de Ciencias Forenses',
                'direccion' => 'Calle Doctor Lavista No. 114, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Centro de Justicia alternativa',
                'direccion' => 'Calle Doctor Lavista No. 114, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Patriotismo',
                'direccion' => 'Avenida Patriotismo No. 201, Colonia San Pedro de los Pinos, Alcaldía Benito Juárez, C.P. 03800, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Dr. Liceaga',
                'direccion' => 'Calle Doctor Liceaga No. 97, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Dr. Lavista',
                'direccion' => 'Calle Doctor Lavista No. 114, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Clementina Gil de Léster',
                'direccion' => 'Calle Doctor Lavista No. 114, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Centro de Desarrollo Infantil Gloria Ledúc de Agüero',
                'direccion' => 'Calle Doctor Lavista No. 114, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Centro de Desarrollo Infantil José María Pino Suarez',
                'direccion' => 'Calle Doctor Lavista No. 114, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Centro de Desarrollo Infantil Niños Héroes',
                'direccion' => 'Calle Niños Héroes No. 119, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Archivo Delicias',
                'direccion' => 'Calle Delicias No. 32, Colonia Centro, Alcaldía Cuauhtémoc, C.P. 06010, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Archivo – Fernando de Alva Ixtlilxóchitl',
                'direccion' => 'Calle Fernando de Alva Ixtlilxóchitl No. 185, Colonia Tránsito, Alcaldía Cuauhtémoc, C.P. 06820, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Archivo Dr. Navarro',
                'direccion' => 'Calle Doctor Navarro No. 200, Colonia Doctores, Alcaldía Cuauhtémoc, C.P. 06720, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Reclusorio Preventivo Norte',
                'direccion' => 'Calle Jaime Nunó No. 176, Colonia Cuautepec Barrio Bajo, Alcaldía Gustavo A. Madero, C.P. 07280, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Reclusorio Preventivo Sur',
                'direccion' => 'Calle San Mateo No. 100, Colonia San Mateo Xalpa, Alcaldía Xochimilco, C.P. 16030, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Reclusorio Preventivo Oriente',
                'direccion' => 'Avenida Reforma No. 100, Colonia Reforma Política, Alcaldía Iztapalapa, C.P. 09230, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Reclusorio Preventivo Santa Martha Acatitla',
                'direccion' => 'Avenida Penitenciaria No. 100, Colonia Santa Martha Acatitla, Alcaldía Iztapalapa, C.P. 09510, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Plaza Juarez',
                'direccion' => 'Plaza Juárez No. 20, Colonia Centro, Alcaldía Cuauhtémoc, C.P. 06010, Ciudad de México',
            ],
            [
                'nombre_inmueble' => 'Inmueble Lerma',
                'direccion' => 'Calle Lerma No. 200, Colonia Roma Norte, Alcaldía Cuauhtémoc, C.P. 06700, Ciudad de México',
            ],
        ]);
    }
}
