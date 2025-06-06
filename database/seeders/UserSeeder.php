<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear los roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $revisorRole = Role::firstOrCreate(['name' => 'Revisor']);
        $registradorRole = Role::firstOrCreate(['name' => 'Registrador']);

        // ID del área: DIRECCIÓN EJECUTIVA DE GESTIÓN TECNOLÓGICA
        $areaId = 9;

        // Crear el usuario Administrador
        $admin = User::create([
            'name' => 'Administrador',
            'n_empleado' => '8009933',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'area_id' => $areaId,
        ]);
        $admin->assignRole($adminRole);

        // Crear el usuario Revisor
        $revisor = User::create([
            'name' => 'Revisor',
            'n_empleado' => '8009934',
            'email' => 'revisor@example.com',
            'password' => Hash::make('12345678'),
            'area_id' => $areaId,
        ]);
        $revisor->assignRole($revisorRole);

        // Crear el usuario Registrador
        $registrador = User::create([
            'name' => 'Registrador',
            'n_empleado' => '8009935',
            'email' => 'registrador@example.com',
            'password' => Hash::make('12345678'),
            'area_id' => $areaId,
        ]);
        $registrador->assignRole($registradorRole);
    }
}
