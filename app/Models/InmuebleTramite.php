<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InmuebleTramite extends Model
{
    use HasFactory;

    protected $table = 'inmuebles_tramite'; 
    
    protected $fillable = [
        'tramite_servicio_id',
        'id_inmueble',
        'piso',
        'unidad_administrativa',
    ];

    public function tramite()
    {
        return $this->belongsTo(TramiteServicio::class, 'tramite_servicio_id');
    }

    public function inmueble()
    {
        return $this->belongsTo(CatalogoInmueble::class, 'id_inmueble');
    }

}
