<?php

use App\Livewire\ConsultaTramite;
use App\Livewire\FormularioTramite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TramiteController;
use App\Livewire\ConsultaPublica;
use App\Livewire\PanelUsuarios;
use App\Livewire\VistaPreviaPublica;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::post('/tramite', [TramiteController::class, 'store'])->name('tramite.store');
Route::get('/formulario/tramite/{id}', FormularioTramite::class)->name('formulario.tramite');
Route::get('/consulta/tramite', ConsultaTramite::class)->name('consulta.tramite');
Route::get('/vista/consulta/{id}', VistaPreviaPublica::class)->name('vista.consulta');
Route::get('/consulta/publica', ConsultaPublica::class)->name('consulta.publica');
Route::get('/consulta/usuarios', PanelUsuarios::class)->name('consulta.usuarios');
