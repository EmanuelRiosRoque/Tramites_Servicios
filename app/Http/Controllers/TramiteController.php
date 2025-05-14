<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TramiteServicio;


class TramiteController extends Controller
{
    public function store(Request $request)
    {

            $request->validate([
                'origen' => 'required',
                'nombreTramite' => 'required|string|max:255',
                'descripcionTramite' => 'required|string|max:1000',
                'tipo' => 'required|array',
                'formato' => 'required|in:1,2',
            ]);

            // Crear el trámite
            $tramite = TramiteServicio::create([
                'origen' => $request->origen,
                'nombre_tramite' => $request->nombreTramite,
                'descripcion' => $request->descripcionTramite,
                'tipo' => $request->tipo,
                'formato_requerido' => $request->formato,
                'fk_estatus' => 1,
            ]);

            
            return redirect()->route('formulario.tramite', ['id' => $tramite->id]);
    }
}
