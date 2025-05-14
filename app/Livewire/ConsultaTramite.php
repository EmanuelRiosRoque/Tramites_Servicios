<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TramiteServicio;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')] 
class ConsultaTramite extends Component
{
    public $tramites = []; // 👈 IMPORTANTE: Declararla pública para Livewire
    public $filtro = 'todos';

    public function setFiltro($tipo)
    {
        $this->filtro = $tipo;
    }

    public function renovarTramite($id)
    {
        $tramite = TramiteServicio::find($id);

        if ($tramite) {
            $tramite->fk_estatus = 1; // Estatus para edición o renovación
            $tramite->save();

            return redirect()->route('formulario.tramite', $tramite->id);
        }
    }


    public function render()
    {
        $query = TramiteServicio::query();

        // Condición para Revisor: fk_estatus debe ser 2, para otros >= 1
        if (Auth::user()->hasRole('Revisor')) {
            $query->where('fk_estatus', 2);
        } else {
            $query->where('fk_estatus', '>=', 1);
        }

        // Filtrado por tipo si no es "todos"
        if ($this->filtro !== 'todos') {
            $query->whereJsonContains('tipo', $this->filtro);
        }

        // Solo trámites del área del usuario si aplica
        if (Auth::user()->area_id) {
            $query->where('fk_areasObligada', Auth::user()->area_id);
        }

        $this->tramites = $query->latest()->get(); // Ordena por created_at DESC

        return view('livewire.consulta-tramite');
    }

    
}
