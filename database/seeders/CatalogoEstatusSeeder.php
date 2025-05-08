<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoEstatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('catalogo_estatus')->insert([
            ['nombre' => 'Editar', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'En revisión', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Rechazado', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Publicado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
