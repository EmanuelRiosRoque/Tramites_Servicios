<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea los roles si no existen
        Role::firstOrCreate(['name' => 'evaluador']);
        Role::firstOrCreate(['name' => 'registrador']);
    }
}
