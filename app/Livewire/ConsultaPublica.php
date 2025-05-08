<?php

namespace App\Livewire;

use App\Models\tramiteServicioPublicadoMongo;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ConsultaPublica extends Component
{
    public string $tipoActivo = 'tramite';
    public string $search = '';
    public string|null $origen = null; // ✅ importante: ahora string, no int

    public function setTipo(string $tipo): void
    {
        $this->tipoActivo = $tipo;
        $this->reset('search');
    }

    public function setOrigen(?string $origen): void
    {
        $this->origen = $origen;
    }

    public function render()
    {
        $query = tramiteServicioPublicadoMongo::query()
            ->where('activo', 1);

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nombreTramite', 'like', '%' . $this->search . '%')
                  ->orWhere('descripcionTramite', 'like', '%' . $this->search . '%');
            });
        } else {
            $query->where('tipo', $this->tipoActivo);
        }

        if (!is_null($this->origen)) {
            $query->where('origen', $this->origen); // ✅ compara como string
        }

        $tramites = $query->get();

        return view('livewire.consulta-publica', compact('tramites'));
    }
}
