<?php
namespace App\Livewire;

use App\Models\Paso;
use App\Models\TramiteServicio;
use App\Models\tramiteServicioPublicadoMongo;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class VistaPreviaPublica extends Component
{
    public $tramite;
    public $pasos;

    public function mount($id)
    {
        $this->cargarTramite($id);
    }

    private function cargarTramite($id)
    {
        // Primero intenta buscar en MySQL
        $mysqlTramite = TramiteServicio::find($id);

        if ($mysqlTramite) {
            $this->tramite = $mysqlTramite;
            $this->pasos = $this->buscarPasosMySQL($id);
        } else {
            // Si no existe en MySQL, busca en Mongo
            $mongoTramite = $this->buscarEnMongo($id);

            if ($mongoTramite) {
                $this->tramite = $mongoTramite;
                $this->pasos = collect(); // Mongo no usa pasos separados
            } else {
                // Si no está en ninguna fuente, redirige o cambia de paso
                return redirect()->route('consulta.publica');
            }
        }
    }

    private function buscarEnMongo($id)
    {
        return tramiteServicioPublicadoMongo::where('id', $id)
            ->where('activo', 1)
            ->first();
    }

    private function buscarPasosMySQL($id)
    {
        return Paso::where('tramite_servicio_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.vista-previa-publica');
    }
}
